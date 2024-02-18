<?php

namespace domain\Services\DocumentService;

use App\Models\Document;
use App\Models\UserDocument;
use App\Models\File as DocumentFile;
use domain\Facades\ImageFacade;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class DocumentService
{
    protected $documents;
    protected $document_user;
    protected $document_file;

    public function __construct()
    {
        $this->documents = new Document();
        $this->document_user = new UserDocument();
        $this->document_file = new DocumentFile();
    }

    public function allMyDocuments()
    {
        return $this->document_user->where('user_id', Auth::id())->get();
    }

    /**
     * all
     *
     * @return void
     */
    public function all()
    {
        return $this->documents->all();
    }

    /**
     * get
     *
     * @param  mixed $document_id
     * @return void
     */
    public function get($document_id)
    {
        return $this->documents->find($document_id);
    }

    /**
     * create
     *
     * @param  mixed $data
     * @return void
     */
    public function create(array $data)
    {
        $count = $this->documents->count();

        $code = 'RF' . sprintf('%08d', $count + 1);
        $check = $this->documents->where('ref_no', $code)->first();

        while ($check) {
            $count++;
            $code = 'RF' . sprintf('%08d',  $count);
            $check = $this->documents->where('ref_no', $code)->first();
        }


        // if (isset($data['files'])) {
        //     $file = $data['files'];
        //     $path = $file->store('public/uploads');
        //     $data['file'] = str_replace('public/uploads/', '', $path);
        // }


        $data['ref_no'] = $code;
        $data['created_by'] = Auth::id();
        $data['updated_by'] = Auth::id();
        // dd($data);
        $new_doc = $this->documents->create($data);
        if (isset($data['files'])) {
            foreach ($data['files'] as $file) {
                $path = $file->store('public/uploads');
                $data['file_path'] = str_replace('public/uploads/', '', $path);
                $data['file_name'] = $file->getClientOriginalName();
                $data['document_id'] = $new_doc->id;
                $this->document_file->create($data);
            }
        }

        return $new_doc;
    }

    // public function create(array $data)
    // {
    //     $count = $this->documents->count();

    //     $code = 'RF' . sprintf('%08d', $count + 1);
    //     $check = $this->documents->where('ref_no', $code)->first();

    //     while ($check) {
    //         $count++;
    //         $code = 'RF' . sprintf('%08d', $count);
    //         $check = $this->documents->where('ref_no', $code)->first();
    //     }

    //     // Handle multiple file uploads
    //     if (isset($data['files']) && is_array($data['files'])) {
    //         $filesData = [];

    //         foreach ($data['files'] as $file) {
    //             $path = $file->store('public/uploads');
    //             $filesData[] = str_replace('public/uploads/', '', $path);
    //         }

    //         // Convert the array of file paths to a JSON string before storing in the database
    //         $data['files'] = json_encode($filesData);
    //     }

    //     $data['ref_no'] = $code;
    //     $data['created_by'] = Auth::id();
    //     $data['updated_by'] = Auth::id();

    //     return $this->documents->create($data);
    // }

    /**
     * update
     *
     * @param  mixed $document_id
     * @param  mixed $data
     * @return void
     */
    public function update($document_id, array $data)
    {
        $document = $this->documents->find($document_id);

        if (isset($data['files'])) {
            foreach ($data['files'] as $file) {
                $path = $file->store('public/uploads');
                $data['file_path'] = str_replace('public/uploads/', '', $path);
                $data['file_name'] = $file->getClientOriginalName();
                $data['document_id'] = $document_id;
                $this->document_file->create($data);
            }
        }
        $data['updated_by'] = Auth::id();
        return $document->update($this->edit($document, $data));
    }

    protected function edit(Document $document, $data)
    {
        return array_merge($document->toArray(), $data);
    }

    public function getAllDocumentFiles(int $document_id)
    {
        return $this->document_file->where('document_id', $document_id)->get();
    }

    /**
     * delete
     *
     * @param  mixed $document_id
     * @return void
     */
    public function delete($document_id)
    {
        $document = $this->documents->find($document_id);
        $files = $this->document_file->where('document_id', $document_id)->get();
        foreach ($files as $file) {
            $this->document_file->find($file->id)->delete();
        }
        $documentUsers = $this->document_user->where('document_id', $document_id)->get();
        foreach ($documentUsers as $documentUser) {
            $documentUser->delete();
        }
        return $document->delete();
    }

    public function fileDelete($file_id)
    {
        $document_file = $this->document_file->find($file_id);
        return $document_file->delete();
    }

    public function getByFilterAllTable($data)
    {
        return $this->documents->getByFilterAllTable($data);
    }

    public function getMyDocumentsByFilterAllTable($data)
    {
        return $this->documents->getMyDocumentsByFilterAllTable($data);
    }
    public function getDocumentUsers($data)
    {
        return $this->document_user->getDocumentUsers($data);
    }
    public function getUserDocuments($data)
    {
        return $this->document_user->getUserDocuments($data);
    }

    public function getUserDocumentsAll($data)
    {
        return $this->document_user->getUserDocumentsAll($data);
    }

    public function addUser($data)
    {
        // $document = $this->documents->find($data['document_id']);
        // $document->users()->attach($data['user_ids']);
        // return $document;
        $document = $this->documents->find($data['document_id']);
        $attachedUserIds = $document->users()->syncWithoutDetaching($data['user_ids']);

        $now = Carbon::now();
        $creatorUserId = Auth::user()->id;

        foreach ($attachedUserIds as $userId) {
            // Check if the pivot record is new and doesn't have a created_at timestamp
            $pivotRecord = $this->document_user
                ->where('document_id', $document->id)
                ->where('user_id', $userId)
                ->first();

            if ($pivotRecord && empty($pivotRecord->created_at)) {
                $this->document_user
                    ->where('document_id', $document->id)
                    ->where('user_id', $userId)
                    ->update([
                        'created_at' => $now,
                        'updated_at' => $now,
                        'created_user_id' => $creatorUserId,
                    ]);
            }
        }

        $duplicatedUserIds = array_diff($data['user_ids'], $attachedUserIds['attached']);

        if (count($duplicatedUserIds) > 0) {
            // If there are duplicated users, return a response indicating which user IDs are duplicated
            $response['alert-danger'] = 'Some users were already associated with the document.';
            // return response()->json(['message' => 'Some users were already associated with the document.', 'duplicated_user_ids' => $duplicatedUserIds], 200);
        } else {
            // If no duplicated users, simply return the document
            $response['alert-success'] = 'Users added successful.';
        }
        return $response;
    }

    public function userRemove($document_user_id)
    {
        $document_user = $this->document_user->find($document_user_id);
        $document_user->delete();
    }

    public function updateViewCount($document_id)
    {
        $document_user = $this->document_user->where('document_id', $document_id)->where('user_id', Auth::id())->first();
        $document_user->status = 1;
        $document_user->save();
    }
}
