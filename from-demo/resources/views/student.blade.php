<div>
    <!-- Happiness is not something readymade. It comes from your own actions. - Dalai Lama -->

    <h1>Students details</h1>

    <table border="1">
        <tr>
            <td>Id</td>
            <td>Name</td>
            <td>class</td>
            <td>Subject</td>
        </tr>
        @foreach ($students as $student)
        <tr>
            <td>{{ $student -> id }}</td>
            <td>{{ $student -> name }}</td>
            <td>{{ $student -> class }}</td>
            <td>{{ $student -> subject }}</td>
        </tr>
            
        @endforeach
    </table>
</div>
