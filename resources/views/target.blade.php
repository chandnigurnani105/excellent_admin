@extends('layouts.layout')
<script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
@section('content')
<h3>
    Welcome to target page
</h3>

<div>
    
    <select name="role" id="role" class="choice w-25 mb-3">
        <option>--Select Role--</option>
        <option value="bd">BD</option>
        <option value="hr">HR</option>
    </select>
    
    <div id="BD" style="display: none;" class="m-2">
        <form action="{{route('target.create')}}" method="post" class="form-control">
            @csrf
            <div class="m-0">
                <!--begin::Select-->
                <select class="form-select-sm select2-hidden-accessible" name="changeStatus" id="changeStatus" data-control="select2" data-placeholder="Filters" data-hide-search="true">
                    <option>--Target Status--</option>
                    <option value="Processing">InProcess</option>
                    <option value="Pending">Pending</option>
                    <option value="Completed" >Completed</option>
                </select>
                <!--end::Content-->
            <label for="duedate">Due Date:</label>
            <input type="date" id="duedate" name="duedate" >
            <label for="employee">Assign to</label>
            <select name="employee" id="employee">
                @foreach ($data as $key => $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            </div>
            <br>
            <label >Blogs </label>
                <input type="text" name="blogs" class="form-control"> 
            <label >Social Media</label>
            <input type="text" name="social_media" class="form-control">
            <label>Website</label>
            <input type="text" name="website" class="form-control">
            <label >App</label>
            <input type="text" name="apps" class="form-control" >
            <label >Comment</label>
            <textarea name="comment" class="form-control" form="usrform"></textarea>
            <button type="submit" class="btn btn-dark m-3">Add Data</button>
        </form>
       
    </div>

    <div id="hr"  style="display: none;">
        <select name="hr_level" id="hr_level" class="w-25">
            <option>--Select--</option>
            <option value="sr_hr">Senior HR</option>
            <option value="jr_hr">Junior HR</option>
        </select>
        <div id="jn_hr" style="display: none;">
            <h3>Junior HR</h3>
            <form action="{{route('target.create')}}" method="post" class="form-control">
                @csrf
                <div class="m-0">
                    <!--begin::Select-->
                    <select class="form-select-sm select2-hidden-accessible" name="changeStatus" id="changeStatus" data-control="select2" data-placeholder="Filters" data-hide-search="true">
                        <option>--Target Status--</option>
                        <option value="Processing">InProcess</option>
                        <option value="Pending">Pending</option>
                        <option value="Completed" >Completed</option>
                    </select>
                    <!--end::Content-->
                    
                <label for="duedate">Due Date:</label>
                <input type="date" id="duedate" name="duedate" >
                <label for="employee">Assign to</label>
                <select name="employee" id="employee">
                    @foreach ($data as $key => $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
                </div>
                <br>
                <label >Blogs </label>
                    <input type="text" name="blogs" class="form-control"> 
                <label >Social Media</label>
                <input type="text" name="social_media" class="form-control">
                <label>Website</label>
                <input type="text" name="website" class="form-control">
                <label >App</label>
                <input type="text" name="apps" class="form-control" >
                <label >Comment</label>
                <textarea name="comment" class="form-control" form="usrform"></textarea>
                <button type="submit" class="btn btn-dark m-3">Add Data</button>
            </form>
           
        </div> 
        <div id="sr_hr" style="display: none;">
            <h3>Senior HR</h3>
            <form action="{{route('target.create')}}" method="post" class="form-control">
                @csrf
                <div class="m-0">
                    <!--begin::Select-->
                    <select class="form-select-sm select2-hidden-accessible" name="changeStatus" id="changeStatus" data-control="select2" data-placeholder="Filters" data-hide-search="true">
                        <option>--Target Status--</option>
                        <option value="Processing">InProcess</option>
                        <option value="Pending">Pending</option>
                        <option value="Completed" >Completed</option>
                    </select>
                    <!--end::Content-->
                    
                <label for="duedate">Due Date:</label>
                <input type="date" id="duedate" name="duedate" >
                <label for="employee">Assign To</label>
                <select name="employee" id="employee">
                    @foreach ($data as $key => $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
                </div>
                <br>
                <label >Blogs </label>
                    <input type="text" name="blogs" class="form-control"> 
                <label >Social Media</label>
                <input type="text" name="social_media" class="form-control">
                <label>Website</label>
                <input type="text" name="website" class="form-control">
                <label >App</label>
                <input type="text" name="apps" class="form-control" >
                <label >Comment</label>
                <textarea name="comment" class="form-control" form="usrform"></textarea>
                <button type="submit" class="btn btn-dark m-3">Add Data</button>
            </form>
           
        </div>
    </div>
    
</div>



<script type="text/javascript">
    // It will print the selected value
    function displayNum() {
       console.log($("select#role").val());
       if($("select#role").val() == "bd")
       {
             
        $("#BD").show(); // Adds to the document
        $("#hr").hide(); 

       }
       else{
        $("#hr").show();  
        $("#BD").hide(); // Adds to the document

       }
   }
   function displaydetail()
   {
    console.log($("select#hr_level").val());
    if($("select#hr_level").val() === "jr_hr")
       { 
        $("#jn_hr").show(); 
        $("#sr_hr").hide();
       }
       else
       {
        $("#sr_hr").show();
        $("#jn_hr").hide(); 
       }
   }

   // When the selected value will change,
   // the above function is called
   $("select#role").change(displayNum); 

   $("select#hr_level").change(displaydetail); 

   $("form").submit(function(e) {

        e.preventDefault(); // avoid to execute the actual submit of the form.

        var form = $(this);
        var actionUrl = form.attr('action');
        var role = $("select#role").val();
       var hr_type = $("select#hr_level").val()
        console.log(role);

        if(role == "hr")
        {
            $.ajax({
            type: "POST",
            url: actionUrl,
            data: form.serialize() + '&role=' + role  + '&hr_type=' + hr_type, // serializes the form's elements.
            success: function(data)
            {
            alert(data); // show response from the php script.
            }
        });
        }
        else
        {
            $.ajax({
            type: "POST",
            url: actionUrl,
            data: form.serialize() + '&role=' + role , // serializes the form's elements.
            success: function(data)
            {
            alert(data); // show response from the php script.
            }
        });

        }
        
});
</script>   

@endsection