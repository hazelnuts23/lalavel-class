<form method="post" action="{{ route('courses.store') }}">
    {{ csrf_field() }}
    Course Name: <input type="text" name="course_name" value="{{ old('course_name') }}"> <br/>
    Course Hour: <input type="text" name="course_hour" value="{{ old('course_hour') }}"> <br/>
    Course Desc: <textarea name="course_desc">{{ old('course_desc') }}</textarea> <br/>
    <div style="clear:both"></div>
    <input type="submit" value="Save"> <a href="{{ url()->previous()  }}">Back</a>
</form>