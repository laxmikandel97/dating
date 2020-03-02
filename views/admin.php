<include href="views/header.html"/>
<body>
<h3> Members of Dating app</h3>
<table id="datingTable" class="table table-bordered">
    <thead class="table-active">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Age</th>
        <th>Phone</th>
        <th>Email</th>
        <th>State</th>
        <th>Gender</th>
        <th>Seeking</th>
        <th>Bio</th>
        <th>Premium</th>
        <th>Interests</th>
        <th>Image</th>
    </tr>
    </thead>
    <tbody>
    <repeat group="{{ @allMembers  }}" value="{{ @value }}">
        <tr>
            <td>{{ @value['member_id'] }}</td>
            <td>{{ @value['fname'] }} {{ @value['lname'] }}</td>
            <td> {{ @value['age'] }}</td>
            <td> {{ @value['phone'] }}</td>
            <td>{{ @value['email'] }}</td>
            <td>{{ @value['state'] }}</td>
            <td> {{ @value['gender'] }}</td>
            <td> {{ @value['seeking'] }}</td>
            <td> {{ @value['bio'] }}</td>
            <td>
                <check if="{{ @value['premium']=='1' }}">
                <true>
                    <input type="checkbox" checked>
                </true>
                <false>
                    <input type="checkbox">
                </false>
            </check>
            </td>
            <td>interest</td>
            <td>Null</td>
        </tr>
    </repeat>

    </tbody>
</table>
</body>
</html>

