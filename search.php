<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Results</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: linear-gradient(120deg, #7f6fff 0%, #bcf1fa 100%);
            margin: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .results-section {
            margin-top: 46px;
            width: 98%; max-width: 830px;
            padding: 0 15px 44px 15px;
        }
        .results-title {
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.05em;
            color: #343cd5;
            font-weight: 800;
            gap: 11px;
            letter-spacing: 2px;
            margin-bottom: 34px;
            text-shadow: 0 4px 22px #476fe420;
        }
        .results-title i { color: #2acefa; font-size: 1.1em; }
        .results-list {
            display: flex;
            flex-direction: column;
            gap: 31px;
        }
        .result-card {
            display: flex;
            flex-direction: row;
            background: linear-gradient(100deg, #fff 0%, #c1e7fb 100%);
            border-radius: 22px;
            box-shadow: 0 8px 35px #486fe626;
            padding: 28px 32px 23px 25px;
            min-height: 132px;
            align-items: center;
            position: relative;
            transition: box-shadow 0.18s, transform 0.15s;
            border-left: 8px solid #3b54ee;
        }
        .result-card:hover {
            box-shadow: 0 12px 40px #3bfde85f;
        }
        .avatar {
            background: linear-gradient(135deg,#3bfde8 0%, #6166f7 100%);
            border-radius: 50%; width: 68px; height: 68px;
            display: flex; align-items: center; justify-content: center;
            box-shadow: 0 0 14px #33bdff31;
            margin-right: 25px;
        }
        .avatar i {
            font-size: 2em;
            color: #fff;
        }
        .info-section {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 7px;
        }
        .profile-name {
            font-size: 1.15em;
            color: #253475;
            font-weight: bold;
            margin-bottom: 3px;
        }
        .profile-course {
            color: #2ea5ee;
            font-size: 1em;
            margin-bottom: 7px;
        }
        .card-details-row {
            display: flex; gap: 16px; flex-wrap: wrap;
            margin-top: 6px;
        }
        .badge {
            background: #3b54ee;
            color: #fff;
            border-radius: 13px;
            padding: 7px 15px;
            font-size: 1em;
            font-weight: 600;
            display: flex; align-items: center; gap: 7px;
        }
        .badge.sex { background: #2acefa; color: #214c79; }
        .badge.level { background: #7f6fff; }
        .footer-bar {
            margin-top: 18px; text-align: right; color: #3b54ee;
            font-size: 1.00em; font-weight: 600; opacity: 0.85;
        }
        .no-record {
            margin-top: 40px;
            text-align: center;
            font-size: 1.12em; color: #d44e4e;
            padding: 18px 0 18px 0; border-radius: 15px;
            background: #fff4f4; box-shadow: 0 2px 11px #FC5A2960;
            max-width: 410px; margin-left: auto; margin-right: auto;
        }
        @media (max-width:690px) {
            .result-card {flex-direction:column;align-items:flex-start;padding:15px 9px 14px 9px;}
            .avatar {margin-bottom:11px;}
        }
    </style>
</head>
<body>
    <div class="results-section">
        <div class="results-title"><i class="fas fa-search"></i>Search Results</div>
        <div class="results-list">
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
            $sql = "SELECT * FROM registration WHERE fname LIKE '%$search_name%' OR mname LIKE '%$search_name%' OR lname LIKE '%$search_name%'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<script>alert('Record(s) found: " . $result->num_rows . " record(s)');</script>";
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='result-card'>
                            <div class='avatar'><i class='fas fa-user-astronaut'></i></div>
                            <div class='info-section'>
                                <div class='profile-name'>" . htmlspecialchars($row['fname']) . " " . htmlspecialchars($row['lname']) . "</div>
                                <div class='profile-course'><i class='fas fa-graduation-cap'></i> " . htmlspecialchars($row['course']) . "</div>
                                <div class='card-details-row'>
                                    <span class='badge'><i class='fas fa-address-card'></i> " . htmlspecialchars($row['mname']) . "</span>
                                    <span class='badge level'><i class='fas fa-layer-group'></i> " . htmlspecialchars($row['level']) . "</span>
                                    <span class='badge sex'><i class='fas fa-venus-mars'></i> " . htmlspecialchars($row['sex']) . "</span>
                                </div>
                                <div class='footer-bar'><i class='fas fa-info-circle'></i> End of record</div>
                            </div>
                        </div>";
                }
            } else {
                echo "<div class='no-record'>
                        <i class='fas fa-exclamation-triangle'></i> No records found for \"" . htmlspecialchars($search_name) . "\".
                     </div>";
            }
        }
        $conn->close();
        ?>
        </div>
    </div>
</body>
</html>
