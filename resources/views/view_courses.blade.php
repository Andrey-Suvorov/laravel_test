<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Welcome to the task</title>
        <style>
            @import url(//fonts.googleapis.com/css?family=Lato:700);

            body {
                margin:0;
                font-family:'Lato', sans-serif;
                text-align:center;
                color: #999;
            }

            .header {
                width: 100%;
                left: 0px;
                top: 5%;
                text-align: left;
                border-bottom: 1px  #999 solid;
            }

            .student-table{
                width:100%;  
            }

            table.student-table th{
                background-color: #C6C6C6;
                text-align: left;
                color: white;
                padding:7px 3px;
                font-weight: 700;
                font-size: 18px;
            }

            table.student-table tr.odd {
                text-align: left;
                padding:5px;
                background-color: #F9F9F9;
            }

            table.student-table td{
                text-align: left;
                padding:5px;
            }

            a, a:visited {
                text-decoration:none;
                color: #999;
            }

            h1 {
                font-size: 32px;
                margin: 16px 0 0 0;
            }
        </style>
    </head>

    <body>

    <div class="navigation">
        <a href="{{url('students')}}" title="task">Students</a>
        <a href="{{url('courses')}}" title="task">Courses</a>
    </div>

    @include('layouts.errors')
        <form method="POST" action="/export_courses">
            {{ csrf_field() }}
            <div class="header">
                <div><img src="/images/logo_sm.jpg" alt="Logo" title="logo"></div>
                <div  style='margin: 10px;  text-align: left'>
                    <input id="check-all-button" data-checked="false" type="button" value="Select All"/>
                    <input type="submit" value="Export"/>
                </div>
            </div>



            <div style='margin: 10px; text-align: center;'>
                <table class="student-table">
                    <tr>
                        <th></th>
                        <th>Course</th>
                        <th>University</th>
                        <th>Students Count</th>
                    </tr>

                    @if(  count($courses) > 0 )
                    @foreach($courses as $course)
                    <tr>
                        <td><input class="form-checkboxes" type="checkbox" name="courses[]" value="{{$course['id']}}"></td>
                        <td style=' text-align: left;'>{{$course['course_name']}}</td>
                        <td style=' text-align: left;'>{{$course['university']}}</td>
                        <td style=' text-align: left;'>{{count($course['students'])}}</td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="6" style="text-align: center">Oh dear, no data found.</td>
                    </tr>
                    @endif
                </table>
            </div>

        </form>
    @include('layouts.footer')

        
    </body>

</html>
