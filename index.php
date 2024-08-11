<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remote Control Test</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center; /* Center all text and elements */
            margin: 20px;
        }
        .last-clicked {
            margin-bottom: 20px; /* Space between the message and the buttons */
            font-size: 18px;
            font-weight: bold;
        }
        .button-container {
            display: flex;
            gap: 10px;
            justify-content: center; /* Center buttons horizontally */
            flex-wrap: wrap; /* Allow buttons to wrap to the next line on smaller screens */
            margin-top: 20px;
        }
        button {
            padding: 16px 20px;
            font-size: 18px;
            background: linear-gradient(45deg, transparent 5%, #DA7297 5%);
            border: 0;
            color: #fff;
            letter-spacing: 3px;
            line-height: 1;
            box-shadow: 6px 0px 0px #667BC6;
            outline: transparent;
            position: relative;
            cursor: pointer;
        }
        button::after {
            --slice-0: inset(50% 50% 50% 50%);
            --slice-1: inset(80% -6px 0 0);
            --slice-2: inset(50% -6px 30% 0);
            --slice-3: inset(10% -6px 85% 0);
            --slice-4: inset(40% -6px 43% 0);
            --slice-5: inset(80% -6px 5% 0);
            content: "HOVER ME";
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent 3%, #667BC6 3%, #667BC6 5%, #DA7297 5%);
            text-shadow: -3px -3px 0px #f8f005, 3px 3px 0px #667BC6;
            clip-path: var(--slice-0);
        }
        button:hover::after {
            animation: 1s glitch;
            animation-timing-function: steps(2, end);
        }
        @keyframes glitch {
            0% { clip-path: var(--slice-1); transform: translate(-20px, -10px); }
            10% { clip-path: var(--slice-3); transform: translate(10px, 10px); }
            20% { clip-path: var(--slice-1); transform: translate(-10px, 10px); }
            30% { clip-path: var(--slice-3); transform: translate(0px, 5px); }
            40% { clip-path: var(--slice-2); transform: translate(-5px, 0px); }
            50% { clip-path: var(--slice-3); transform: translate(5px, 0px); }
            60% { clip-path: var(--slice-4); transform: translate(5px, 10px); }
            70% { clip-path: var(--slice-2); transform: translate(-10px, 10px); }
            80% { clip-path: var(--slice-5); transform: translate(20px, -10px); }
            90% { clip-path: var(--slice-1); transform: translate(-10px, 0px); }
            100% { clip-path: var(--slice-1); transform: translate(0); }
        }
    </style>
</head>
<body>
    <h1>Remote Control Test</h1>
    
    <!-- Display the last clicked button -->
    <div class="last-clicked">
        <?php
        // Start the session
        session_start();

        // Check if the session variable 'last_button' is set and display it
        if (isset($_SESSION['last_button'])) {
            echo "Last button clicked: " . htmlspecialchars($_SESSION['last_button']);
            // Clear the session variable after displaying
            unset($_SESSION['last_button']);
        } else {
            echo "No button clicked yet.";
        }
        ?>
    </div>

    <!-- Buttons to send data -->
    <div class="button-container">
        <form action="dp.php" method="get">
            <input type="hidden" name="Data" value="front">
            <button type="submit">Front</button>
        </form>
        <form action="dp.php" method="get">
            <input type="hidden" name="Data" value="back">
            <button type="submit">Back</button>
        </form>
        <form action="dp.php" method="get">
            <input type="hidden" name="Data" value="left">
            <button type="submit">Left</button>
        </form>
        <form action="dp.php" method="get">
            <input type="hidden" name="Data" value="right">
            <button type="submit">Right</button>
        </form>
        <form action="dp.php" method="get">
            <input type="hidden" name="Data" value="stop">
            <button type="submit">Stop</button>
        </form>
    </div>
</body>
</html>
