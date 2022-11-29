<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">

    <title>ICTC - Report</title>
    <style>
        .text-right {
            text-align: right;
        }
    </style>

</head>
<body style="background: white">
    <div class="container">
    <!-- border-collapse:collapse; -->
        <table style="width:100%;">
            <tr>
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <td style="width: 15%;"></td>
                <td style="margin: auto;width: 70%;padding: 10px;text-align: center;">
                    <h3>ICTC</h3><h4>MONTHLY REPORT</h4>
                </td>
                <td style="width: 15%;"></td>
                <!-- <img src="{{ asset('assets/img/logo.png') }}" alt=""> -->
            </tr>
        </table>
        <table style="width:100%;">
            <tr>
                <td style="max-width: 30%;
                        white-space:wrap;">
                        FROM : <?php 
                        $id = auth()->id();
                        $user = DB::table('users')->where('id',$id)->get('name');
                        $user = $user[0]->name;
                        echo $user; ?>
                </td>
                <td style="max-width: 30%;white-space:wrap;">TO : </td>
                <td style="max-width: 30%;white-space:wrap;">DATE : </td>
            </tr>
        </table>
            <?php
                $no = 1;
                $message = "No activity this week";
                $id = auth()->id();
                $carbon = \Carbon\Carbon::now();  
                $weekStartDate = $carbon->startOfWeek()->format('Y-m-d H:i');
                $weekEndDate = $carbon->endOfWeek()->format('Y-m-d H:i');
                $todos = DB::select("SELECT * FROM todos WHERE user_id = $id AND created_at BETWEEN '$weekStartDate' AND '$weekEndDate' UNION SELECT * FROM todos WHERE id IN(SELECT todo_id FROM transfers WHERE user_id = $id) AND created_at BETWEEN '$weekStartDate' AND '$weekEndDate'");
                $id = auth()->id();
                $user = DB::table('users')->where('id',$id)->get('name');
                $user = $user[0]->name;
            ?>
            <br />
            <table class='display' width='100%' style='font-family: sans-serif;'>
                <thead style="padding: 20px;">
                    <tr><td style="border: 1px solid grey">#</td><td style="border: 1px solid grey">Activity</td><td style="border: 1px solid grey">Deadline</td><td style="border: 1px solid grey">Progress</td><td style="border: 1px solid grey">Status</td><td style="border: 1px solid grey">Output</td></tr>
                </thead>
                <tbody style="padding: 10px;">
                @foreach($todos as $todo)
                    <?php
                        if($todo->complited == 1){
                            $status = 'Completed';
                        }else{
                            $status = 'Pending';
                        }
                    ?>
                    <tr>
                        <td style="padding: 10px;border: 1px solid grey">{{ $no }}</td>
                        <td style="padding: 10px;border: 1px solid grey">{{ $todo->title }}</td>
                        <td style="padding: 10px;border: 1px solid grey">{{ $todo->deadline }}</td>
                        <td style="padding: 10px;border: 1px solid grey">{{ $todo->progress }}</td>
                        <td style="padding: 10px;border: 1px solid grey">{{ $status }}</td>
                        <td style="padding: 10px;border: 1px solid grey">{{ $todo->output }}</td>
                    </tr>
                    <?php $no++; ?>
                @endforeach
                </tbody>
            </table>
    </div>
    
    </body>
    </html>