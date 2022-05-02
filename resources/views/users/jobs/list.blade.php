<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UserJobs List</title>
</head>
<body>
    <table>
        <tr>
            <th>user_job_id</th>
            <th>job_class</th>
            <th>user_id</th>
            <th>status</th>
            <th>progress</th>
            <th>payload</th>
            <th>created_at</th>
            <th>updated_at</th>
        </tr>
        @foreach($userJobs as $userJob)
            <tr>
                <td>{{ $userJob->user_job_id }}</td>
                <td>{{ $userJob->job_class }}</td>
                <td>{{ $userJob->user_id }}</td>
                <td>{{ $userJob->status }}</td>
                <td>{{ $userJob->progress }}</td>
                <td>{{ json_encode($userJob->payload) }}</td>
                <td>{{ $userJob->created_at }}</td>
                <td>{{ $userJob->updated_at }}</td>
            </tr>
        @endforeach
    </table>

    <a href="{{ route('users-jobs.create') }}">Create new</a>
    <a href="{{ route('users-jobs.create-random') }}">Create job with random properties</a>

</body>
</html>
