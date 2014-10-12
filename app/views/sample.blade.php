<!DOCTYPE html>
<html>
    <head>
        <title>Twitter Clone</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- Bootstrap -->
        {{ HTML::style('css/bootstrap.min.css') }}
        {{ HTML::style('css/bootstrap-theme.min.css') }}
        {{ HTML::script('js/bootstrap.min.js') }}

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

        <!--[if IE]>
          <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- Main Stylesheet File -->
        {{ HTML::style('css/style.css') }}

        <!-- Import Google Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,500' rel='stylesheet' type='text/css'>
    </head>

    <body>
    	


    		<div class="col-sm-6 col-md-4" id="header-user-pic">
		    	<div class="thumbnail">
			        <a href="{{URL::to('/')}}">{{ HTML::image("uploads/" . $imgPath, "Logo") }}</a>
			        <div class="sample">
				       
						   <!--  <input type="file"> -->
						    {{ Form::open(array('url' => 'sample2', 'files' => true)) }}
						     	<span class="btn btn-default btn-file">
									Browse{{ Form::file('image') }}
								</span>
								
								{{ Form::submit('Upload', array('class' => 'btn btn-success')) }}
							{{ Form::close() }}
						
					</div>
			        <div class="caption">
	
			     	</div>
		    	</div>
		  	</div>
	    	
	
		




		

	</body>
</html>







    <?php 
    class UploadController extends BaseController {

    public $restful = true;

    public function index(){
	    $valid_exts = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
	    $max_size = 2000 * 1024; // max file size (200kb)
	    $path = public_path() . '/img/'; // upload directory
	    $fileName = NULL;

	    if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
		    $file = Input::file('uploaded_img');
		    // get uploaded file extension
		    //$ext = $file['extension'];
		    $ext = $file->guessClientExtension();
		    // get size
		    $size = $file->getClientSize();
		    // looking for format and size validity
		    $name = $file->getClientOriginalName();

		    if (in_array($ext, $valid_exts) AND $size < $max_size) {
		    // move uploaded file from temp to uploads directory
			    if ($file->move($path, $name)) {
				    $status = 'Image successfully uploaded!';
				    $fileName = $name;
			    } else {
			    	$status = 'Upload Fail: Unknown error occurred!';
			    }
		    } else {
		    	$status = 'Upload Fail: Unsupported file format or It is too large to upload!';
		    }
	    } else {
	    	$status = 'Bad request!';
	    }
	    // echo out json encoded status
	    return header('Content-type: application/json') . json_encode(array('status' => $status,
	    'fileName' => $fileName));
    }
    }
    ?>








