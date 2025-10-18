<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Registration Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background: linear-gradient(120deg, #e3ffe9 0%, #a1c4fd 100%);
            min-height: 100vh;
            margin: 0;
            font-family: 'Segoe UI', Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: stretch;
        }
        .top-nav {
            background: linear-gradient(90deg, #2b5876 0%, #4e4376 100%);
            box-shadow: 0 6px 25px #2b587650;
            padding: 0 8vw 0 2vw;
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
        }
        .nav-brand {
            display: flex;
            align-items: center;
            gap: 15px;
            font-size: 1.44em;
            font-weight: 700;
            color: #fbfbfb;
            letter-spacing: 2px;
            padding: 19px 0;
        }
        .nav-brand i {
            font-size: 2em;
            color: #64ffda;
        }
        .nav-links {
            display: flex;
            gap: 2.5vw;
        }
        .nav-link {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-decoration: none;
            color: #faf9fd;
            font-weight: 550;
            font-size: 1.04em;
            letter-spacing: 1px;
            transition: color 0.19s, transform 0.18s;
            padding: 12px 10px 6px;
            border-radius: 11px 11px 0 0;
            position: relative;
        }
        .nav-link i {
            font-size: 1.7em;
            margin-bottom: 2px;
            color: #64ffda;
            transition: color 0.18s, transform 0.23s;
        }
        .nav-link:hover, .nav-link.active {
            color: #64ffda;
            background: rgba(76,201,240,0.10);
        }
        .nav-link:hover i, .nav-link.active i {
            color: #57aaff;
            transform: scale(1.11);
        }
        .container {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 28px;
        }
        .edit-card {
            background: rgba(255,255,255,0.97);
            border-radius: 28px;
            box-shadow: 0 10px 44px 0px #41b8f644;
            padding: 42px 42px 35px 42px;
            margin-top: 42px;
            max-width: 460px;
            width: 98%;
            text-align: center;
            animation: cardfadein 0.6s;
        }
        @keyframes cardfadein {
            from { opacity: 0; transform: translateY(30px);}
            to   { opacity: 1; transform: translateY(0);}
        }
        .edit-title {
            display: flex;
            align-items: center;
            font-size: 1.5em;
            color: #3848d1;
            font-weight: 700;
            gap: 14px;
            margin-bottom: 21px;
            letter-spacing: 1.2px;
            justify-content: center;
        }
        .edit-title i {
            color: #64ffda;
            font-size: 1.18em;
            animation: bounceEdit 1.4s infinite alternate;
        }
        @keyframes bounceEdit {
            0% { transform: translateY(0);}
            100% { transform: translateY(-7px);}
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
            align-items: stretch;
            margin-top: 7px;
        }
        label {
            color: #185676;
            font-size: 1.07em;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 7px;
        }
        label i {
            color: #64ffda;
            font-size: 1.13em;
        }
        input[type="text"] {
            border-radius: 9px;
            border: 1.5px solid #badbf7;
            padding: 8px 13px;
            font-size: 1em;
            background: #f7fcff;
            color: #2e5da8;
        }
        input[type="submit"] {
            margin-top: 13px;
            background: linear-gradient(90deg,#57aaff,#64ffda 90%);
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 15px;
            padding: 13px 0;
            box-shadow: 0 6px 18px rgba(100,170,250,0.13);
            font-size: 1.1em;
            letter-spacing: .5px;
            cursor: pointer;
            transition: background 0.21s;
        }
        input[type="submit"]:hover {
            background: linear-gradient(90deg,#64ffda,#57aaff 100%);
        }
        .no-record {
            font-size: 1.13em;
            color: #e06666;
            text-align: center;
            margin-top: 14px;
        }
        @media (max-width:800px) {
            .top-nav {flex-direction: column; gap: 2px; padding: 0 1.5vw;}
            .nav-links {gap: 15px;}
        }
        @media (max-width:600px) {
            .container { padding: 0 5px;}
            .edit-card { padding: 12px 5px 8px 5px;}
            .top-nav {flex-direction: column; gap: 0; padding: 0;}
        }
    </style>
</head>
<body>
    <nav class="top-nav">
        <div class="nav-brand">
            <i class="fas fa-server"></i>
            Group  IT Portal
        </div>
        <div class="nav-links">
            <a class="nav-link" href="insert.html" title="Insert">
                <i class="fas fa-database"></i>
                Insert
            </a>
            <a class="nav-link" href="search.html" title="Search">
                <i class="fas fa-search"></i>
                Search
            </a>
            <a class="nav-link active" href="update.html" title="Update">
                <i class="fas fa-code-branch"></i>
                Update
            </a>
            <a class="nav-link" href="delete.html" title="Delete">
                <i class="fas fa-times-circle"></i>
                Delete
            </a>
        </div>
    </nav>
    <div class="container">
        <div class="edit-card">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "sampledb2";
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("<div style='color:red;'>Connection failed: " . $conn->connect_error . "</div>");
            }
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $search_name = $conn->real_escape_string($_POST['search_name']);
                $sql = "SELECT * FROM registration WHERE fname LIKE '%$search_name%' OR lname LIKE '%$search_name%'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo "<div class='edit-title'><i class='fas fa-code-branch'></i>Edit Details for " . htmlspecialchars($row['fname']) . " " . htmlspecialchars($row['lname']) . "</div>";
                    echo "<form action='update_action.php' method='POST'>
                            <input type='hidden' name='id' value='" . $row['id'] . "'>
                            <label><i class='fas fa-user'></i> First Name:</label><input type='text' name='fname' value='" . htmlspecialchars($row['fname']) . "' required>
                            <label><i class='fas fa-user'></i> Middle Name:</label><input type='text' name='mname' value='" . htmlspecialchars($row['mname']) . "'>
                            <label><i class='fas fa-user'></i> Last Name:</label><input type='text' name='lname' value='" . htmlspecialchars($row['lname']) . "' required>
                            <label><i class='fas fa-graduation-cap'></i> Course:</label><input type='text' name='course' value='" . htmlspecialchars($row['course']) . "'>
                            <label><i class='fas fa-layer-group'></i> Level:</label><input type='text' name='level' value='" . htmlspecialchars($row['level']) . "'>
                            <label><i class='fas fa-venus-mars'></i> Sex:</label><input type='text' name='sex' value='" . htmlspecialchars($row['sex']) . "'>
                            <input type='submit' value='Update'>
                        </form>";
                } else {
                    echo "<div class='no-record'><i class='fas fa-exclamation-triangle'></i> No record found.</div>";
                }
            }
            $conn->close();
            ?>
        </div>
    </div>
</body>
</html>
