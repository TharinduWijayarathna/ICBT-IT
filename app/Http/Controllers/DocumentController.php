<?php

namespace App\Http\Controllers;

use App\Traits\FormHelper;
use domain\Facades\DocumentFacade\DocumentFacade;
use domain\Facades\UserFacade\UserFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Document\CreateDocumentUserRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\UserDocument;
use App\Models\DocumentFile;
use Illuminate\Support\Facades\Storage;
use PDF;

class DocumentController extends ParentController
{
    use FormHelper;

    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        if (Auth::user()->can('read_documents')) {
            $response['documents'] = DocumentFacade::all();
            return view('pages.documents.all')->with($response);
        } else {
            $response['alert-danger'] = 'You do not have permission to read documents.';
            return redirect()->route('my-documents.all')->with($response);
        }
    }

    /**
     * all
     *
     * @param  Request $request
     * @return void
     */
    public function all(Request $request)
    {
        $response['documents'] = DocumentFacade::getByFilterAllTable($request->all());
        $response['tc'] = $this;
        return view('pages.documents.components.table')->with($response);
    }

    public function allDocumentUser(Request $request)
    {
        // dd($request->all());
        $response['documents'] = DocumentFacade::getDocumentUsers($request->all());
        // dd($response['documents']);
        $response['tc'] = $this;
        return view('pages.documents.components.document_users_table')->with($response);
    }
    public function allUserDocuments(Request $request)
    {
        // dd($request->all());
        $response['usersDocuments'] = DocumentFacade::getUserDocuments($request->all());
        $response['tc'] = $this;
        return view('pages.Report.components.table')->with($response);
    }
    public function reportIndex()
    {
        if (Auth::user()->can('read_daily_report')) {
            $response['users'] = UserFacade::all();
            return view('pages.Report.index')->with($response);
        } else {
            $response['alert-danger'] = 'You do not have permission to read documents.';
            return redirect()->route('my-documents.all')->with($response);
        }
    }

    /**
     * store
     *
     * @param  Request $request
     * @return void
     */
    public function store(Request $request)
    {
        if (Auth::user()->can('create_documents')) {
            $customMessages = [
                'ref_no.required' => 'The letter reference number field is required.',
                'ref_no.unique' => 'The letter reference number already exists.',
            ];
            $validator = Validator::make($request->all(), [
                'date' => 'required|date',
                'ref_no' => 'nullable',
                'title' => 'required|string',
                'sender_name' => 'required|string',
                'files' => 'array',
            ], $customMessages);
            // Check if the validation fails
            if ($validator->fails()) {
                $response['alert-danger'] = $validator->errors()->first();
                return redirect()->route('documents.all')->with($response);
            }
            $doc = DocumentFacade::create($request->all());
            $response['alert-success'] = 'Document created successfully';
            return redirect()->route('documents.edit', $doc->id)->with($response);
        } else {
            $response['alert-danger'] = 'You do not have permission to create documents.';
            return redirect()->route('my-documents.all')->with($response);
        }
    }

    /**
     * update
     *
     * @param  Request $request
     * @param  int $doc_id
     * @return void
     */
    public function update(Request $request, int $doc_id)
    {
        if (Auth::user()->can('update_documents')) {
            // dd($request->all());
            $customMessages = [
                'files.required' => 'The document is required.',
                'ref_no.unique' => 'The letter reference number already exists.',
            ];
            $validator = Validator::make($request->all(), [
                'date' => 'required|date',
                'ref_no' => 'nullable',
                'title' => 'required|string',
                'sender_name' => 'required|string',
                'files' => 'array',
            ], $customMessages);
            // Check if the validation fails
            if ($validator->fails()) {
                $response['alert-danger'] = $validator->errors()->first();
                return redirect()->route('documents.edit',$doc_id)->with($response);
            }
            DocumentFacade::update($doc_id, $request->all());
            $response['alert-success'] = 'Document updated successfully';
            return redirect()->route('documents.edit', $doc_id)->with($response);
        } else {
            $response['alert-danger'] = 'You do not have permission to update documents.';
            return redirect()->route('my-documents.all')->with($response);
        }
    }

    /**
     * Edit
     *
     * @param  int $id
     * @return void
     */
    public function edit(int $id)
    {
        if (Auth::user()->can('view_documents')) {
            $response['tc'] = $this;
            $response['document'] = DocumentFacade::get($id);
            $response['users'] = UserFacade::all();
            $response['document_files'] = DocumentFacade::getAllDocumentFiles($id);
            return view('pages.documents.edit')->with($response);
        } else {
            $response['alert-danger'] = 'You do not have permission to view documents.';
            return redirect()->route('my-documents.all')->with($response);
        }
    }

     /**
      * delete
      *
      * @param  int $document_id
      * @return void
      */
     public function delete(int $document_id)
    {
        if (Auth::user()->can('delete_documents')) {
            DocumentFacade::delete($document_id);
            $response['alert-success'] = 'Document deleted successfully';
            return redirect()->route('documents.all')->with($response);
        } else {
            $response['alert-danger'] = 'You do not have permission to delete documents.';
            return redirect()->route('my-documents.all')->with($response);
        }
    }

    public function fileDelete(int $file_id)
    {
        // if (Auth::user()->can('delete_documents')) {
            DocumentFacade::fileDelete($file_id);
            $response['alert-success'] = 'File deleted successfully';
            return redirect()->back()->with($response);
        // } else {
        //     $response['alert-danger'] = 'You do not have permission to delete documents.';
        //     return redirect()->route('my-documents.all')->with($response);
        // }
    }

    /**
     * addUser
     *
     * @param  mixed $request
     * @return void
     */
    public function addUser(Request $request)
    {
        if (Auth::user()->can('add_documents_user')) {
            // Validate the request data
            $validator = Validator::make($request->all(), [
                'user_ids' => 'required',
                'document_id' => 'required',
            ]);
            // Check if the validation fails
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $isUserAdded = DocumentFacade::addUser($request->all());
            return redirect()->back()->with($isUserAdded);
        } else {
            $response['alert-danger'] = 'You do not have permission to create users.';
            return redirect()->route('my-documents.all')->with($response);
        }
    }

    /**
     * userRemove
     *
     * @param  int $document_user_id
     * @return void
     */
    public function userRemove(int $document_user_id)
    {
        if (Auth::user()->can('delete_users')) {
            DocumentFacade::userRemove($document_user_id);
            $response['alert-success'] = 'User removed successfully';
            return redirect()->back()->with($response);
        } else {
            $response['alert-danger'] = 'You do not have permission to delete users.';
            return redirect()->route('my-documents.all')->with($response);
        }
    }


    public function dailySenderReport(Request $request)
    {
        $user = Auth::user();
        $response['sender_name'] = $user->name;
        $response['date'] = $request->date;
        $response['userDocuments'] = DocumentFacade::getUserDocumentsAll($request->all());
        // dd($response);
        return view('report.pages.daily_report')->with($response);
        // $pdf = PDF::loadView('report.pages.daily_report', $response);
        // // return $pdf->stream('Daily_Sender_Report.pdf', ['Attachment' => false]);

        // $pdf->output();
        // $canvas = $pdf->getDomPDF()->getCanvas();
        // $height = $canvas->get_height();
        // $width = $canvas->get_width();
        // $canvas->set_opacity(.1, "Multiply");
        // $canvas->page_text($width / 4, $height / 2, '', null, 150, array(0, 0, 0), 2, 2, -30);

        // // return $pdf->stream("grouped_report.pdf", array("Attachment" => false));
        // $file_name = "daily-senders-report-" . date('Y-m-d') . time() . ".pdf";
        // Storage::put('public/pdf/daily-senders-reports/' . $file_name, $pdf->output());

        // return Storage::url('public/pdf/daily-senders-reports/' . $file_name);

    }

}
