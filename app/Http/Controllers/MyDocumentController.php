<?php

namespace App\Http\Controllers;

use App\Traits\FormHelper;
use Illuminate\Http\Request;
use domain\Facades\DocumentFacade\DocumentFacade;
use Illuminate\Support\Facades\Auth;
use App\Models\UserDocument;

class MyDocumentController extends ParentController
{
    use FormHelper;

    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $response['tc'] = $this;
        return view('pages.my_documents.all')->with($response);
    }

    /**
     * all
     *
     * @param  Request $request
     * @return void
     */
    public function all(Request $request)
    {
        $response['documents'] = DocumentFacade::getMyDocumentsByFilterAllTable($request->all());
        $response['tc'] = $this;
        return view('pages.my_documents.components.table')->with($response);
    }

    /**
     * Edit
     *
     * @param  int $id
     * @return void
     */
    public function view(int $id)
    {
        if (Auth::user()->can('view_my_documents')) {
            $response['tc'] = $this;
            $response['document'] = DocumentFacade::get($id);
            $response['document_files'] = DocumentFacade::getAllDocumentFiles($id);
            DocumentFacade::updateViewCount($id);
            return view('pages.my_documents.view')->with($response);
        } else {
            $response['alert-danger'] = 'You do not have permission to view my documents.';
            return redirect()->route('my-documents.all')->with($response);
        }
    }

    /**
     * downloadDocument
     *
     * @param  mixed $request
     * @param  int $id
     * @return void
     */
    public function downloadDocument(Request $request,int $id)
    {
        $userDocument = UserDocument::where('document_id', $id)->where('user_id', Auth::id())->first();

        $userDocument->downloaded_at = now();
        $userDocument->save();

        return response()->json(['message' => 'Document downloaded successfully!']);
    }


    /**
     * replyDocument
     *
     * @param  mixed $request
     * @param  int $id
     * @return void
     */
    public function replyDocument(Request $request,int $id)
    {
        $userDocumentReply = UserDocument::where('document_id', $id)->where('user_id', Auth::id())->first();

        $replyDate = $request->input('reply_date');
        $userDocumentReply->reply_at = $replyDate;
        $userDocumentReply->save();
        $response['alert-success'] = 'Document reply successfully';
        return redirect()->route('my-documents.all')->with($response);
    }
}
