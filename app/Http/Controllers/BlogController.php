<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;


class BlogController extends Controller
{
    use ApiResponser;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     *
     */
    public function index(){
        $blogs = Blog::all();
        return $this->successResponse($blogs);
        // return response()->json(['data' => $blogs],Response::HTTP_OK);
    } 
    
    /**
     *
     */
    public function store(Request $request){
              
        $this->validate($request,[
            'author' => 'required|max:255',
            'title' => 'required|max:255',
            'email' => 'required|max:255|unique:blogs',
            'country' => 'required|max:255',
            'publish_date' => 'required|max:255',
            'content' => 'required'
            // 'title', 'author','email','country','publish_date','content'
        ]);

        $blog = Blog::create($request->all());
        return $this->successResponse($blog,Response::HTTP_CREATED);
    } 
    
    /**
     *
     */

    public function show($blog){
        $blog = Blog::FindorFail($blog);
        return response()->json(['data' => $blog],Response::HTTP_OK);
    
    } 
    
    /**
     *
     */

    public function update(Request $request,$blog){
        
        $this->validate($request,[
            'author' => 'required|max:255',
            'title' => 'required|max:255',
            'email' => 'required|max:255',
            'country' => 'required|max:255',
            'publish_date' => 'required|max:255',
            'content' => 'required'
        ]);

        $blog = Blog::FindorFail($blog);
        $blog->fill($request->all());
        if($blog->isClean()){
            return $this->errorResponse('At least one value must change',Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $blog->save();
        return $this->successResponse($blog);
    } 
    
    /**
     *
     */
    public function destroy($blog){
        $blog = Blog::FindOrFail($blog);
        $blog->delete($blog);
        $this->successResponse($blog);
    }
}
