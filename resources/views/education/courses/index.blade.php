<a href="{{ route('courses.create') }}">Create Course</a>
<style>
    table th, table td {
        padding: 10px 5px;
    }
    table{
        margin-top: 10px;
    }
</style>
<div>
    <table border="1" cellpadding="0" cellspacing="0">
        <thead>
        <tr>
            <th>ID</th>
            <th>Course Name</th>
            <th>Course Hour</th>
            <th>Course Description</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @if(count($courseList)>0)
            @foreach($courseList as $course)
                <tr>
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->course_name }}</td>
                    <td>{{ $course->course_hour }}</td>
                    <td>{{ $course->course_desc }}</td>
                    <td><a href="{{ route('courses.edit', ['course' => $course->id]) }}">Edit</a>
                        <a href="#" onclick="event.preventDefault();
                                                     document.getElementById('delete-{{$course->id}}').submit();">Delete</a>
                        <form id="delete-{{$course->id}}" action="{{ route('courses.destroy', ['course' => $course->id]) }}" method="POST"
                              style="display: none;">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                        </form>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="5" style="text-align: center">No Data Yet</td>
            </tr>
        @endif
        </tbody>
    </table>
</div>