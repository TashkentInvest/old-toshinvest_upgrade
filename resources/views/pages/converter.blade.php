<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Number to Uzbek Text Converter</title>
    <style>
        /* General body styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Container for the content */
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        /* Header styling */
        h1 {
            color: #2c3e50;
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px;
        }

        /* Input field styling */
        input[type="text"] {
            width: 100%;
            padding: 10px;
            font-size: 18px;
            border: 2px solid #bdc3c7;
            border-radius: 8px;
            box-sizing: border-box;
            outline: none;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus {
            border-color: #3498db;
        }

        /* Output text styling */
        p {
            margin-top: 20px;
            padding: 10px;
            background-color: #ecf0f1;
            border-radius: 8px;
            font-size: 18px;
            color: #34495e;
            word-wrap: break-word;
        }

        /* Style for the placeholder text in input field */
        input[type="text"]::placeholder {
            color: #7f8c8d;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Number to Uzbek Text Converter</h1>
        <input type="text" id="numberInput" placeholder="Enter a number" oninput="convertNumberToText()" />
        <p id="result"></p>
    </div>

    <script>
        const units = ["бир", "икки", "уч", "тўрт", "беш", "олти", "ётти", "саккиз", "тўққиз"];
        const teens = ["ўн", "ўн бир", "ўн ikki", "ўн уч", "ўн тўрт", "ўн беш", 
                       "ўн олти", "ўн ётти", "ўн саккиз", "ўн тўққиз"];
        const tens = ["йигирма", "ўттиз", "қирқ", "эллик", "олтмиш", "етмиш", "саксон", "тўққиз"];
        const hundreds = ["юз", "икки юз", "уч юз", "тўрт юз", "беш юз", "олти юз", "ётти юз", "саккиз юз", "тўққиз юз"];
        const thousands = ["минг", "минг", "минг"];
        const millions = ["миллион", "миллион", "миллион"];
        const milliards = ["миллиард", "миллиард", "миллиард"];
        const femaleThousands = ["бир", "икки"];

        function convertNumberToText() {
            const value = document.getElementById("numberInput").value.replace(/,/g, "");
            const result = numberToUzbekText(value);
            document.getElementById("result").textContent = result;
        }

        function numberToUzbekText(value) {
            let num = parseFloat(value);

            if (isNaN(num)) {
                return "Киритилган қиймат нотўғри";
            }

            if (num === 0) {
                return "нол";
            }

            let sign = num < 0 ? "минус " : "";
            num = Math.abs(num);

            let text = "";

            if (num >= 1000000000) {
                text += getTextByDigitClass(Math.floor(num / 1000000000), milliards);
                num %= 1000000000;
            }

            if (num >= 1000000) {
                text += getTextByDigitClass(Math.floor(num / 1000000), millions);
                num %= 1000000;
            }

            if (num >= 1000) {
                text += getTextByDigitClass(Math.floor(num / 1000), thousands);
                num %= 1000;
            }

            if (num >= 1) {
                text += getTextByDigitClass(Math.floor(num), []);
            }

            return sign + text.trim();
        }

        function getTextByDigitClass(value, digitClass) {
            let text = "";

            if (value >= 100) {
                text += hundreds[Math.floor(value / 100) - 1] + " ";
                value %= 100;
            }

            if (value >= 10) {
                if (Math.floor(value / 10) === 1) {
                    text += teens[value - 10] + " ";
                    value = 0;
                } else {
                    text += tens[Math.floor(value / 10) - 2] + " ";
                    value %= 10;
                }
            }

            if (value >= 1) {
                text += units[value - 1] + " ";
            }

            if (digitClass.length > 0) {
                text += addDigitClassName(digitClass, value);
            }

            return text;
        }

        function addDigitClassName(digitClassArr, lastNumber) {
            let tempText = "";
            if (lastNumber === 1) {
                tempText += digitClassArr[0] + " ";
            } else if ([2, 3, 4].includes(lastNumber)) {
                tempText += digitClassArr[1] + " ";
            } else {
                tempText += digitClassArr[2] + " ";
            }
            return tempText;
        }
    </script>

</body>
</html>
