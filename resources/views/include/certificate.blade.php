<html>

<head>
    <style type='text/css'>
        body {
            color: black;
            /* display: table; */
            font-family: Georgia, serif;
            font-size: 24px;
            text-align: center;
        }

        .container {
            border: 20px solid tan;
            width: 750px;
            height: 563px;
            display: table-cell;
            vertical-align: middle;
        }

        .logo {
            color: tan;
        }

        .marquee {
            color: tan;
            font-size: 48px;
            margin: 20px;
        }

        .assignment {
            margin: 20px;
        }

        .person {
            border-bottom: 2px solid black;
            font-size: 32px;
            font-style: italic;
            margin: 20px auto;
            width: 400px;
        }

        .reason {
            margin: 20px;
        }

        .center {
            width: 50%;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>

<body>
    <div class="center">
        <div class="container" id="reportPrinting">
            <style type='text/css'>
                body {
                    color: black;
                    /* display: table; */
                    font-family: Georgia, serif;
                    font-size: 24px;
                    text-align: center;
                }

                .container {
                    border: 20px solid tan;
                    width: 750px;
                    height: 563px;
                    display: table-cell;
                    vertical-align: middle;
                }

                .logo {
                    color: tan;
                }

                .marquee {
                    color: tan;
                    font-size: 48px;
                    margin: 20px;
                }

                .assignment {
                    margin: 20px;
                }

                .person {
                    border-bottom: 2px solid black;
                    font-size: 32px;
                    font-style: italic;
                    margin: 20px auto;
                    width: 400px;
                }

                .reason {
                    margin: 20px;
                }

                .center {
                    width: 50%;
                    display: block;
                    margin-left: auto;
                    margin-right: auto;
                }
            </style>

            <div class="marquee">
                Certificate of Identification
            </div>

            <div class="assignment">
                This certificate is presented to
            </div>

            <div class="person">
                {{ $detail['firstname'] }}

                {{ $detail['firstname'] }} {{ $detail['lastname'] }} {{ $detail['othernames'] }}
            </div>

            <div class="reason">
                Which idenities him as a *** from {{ $detail['lga'] }} in {{ $detail['state'] }}, Nigeira<br />

            </div>
        </div>
        <br>
        <button onClick="printReport()">Print</button>
    </div>
</body>

<script type="text/javascript">
    function printReport()
    {
        var prtContent = document.getElementById("reportPrinting");
        var WinPrint = window.open();
        WinPrint.document.write(prtContent.innerHTML);
        WinPrint.document.close();
        WinPrint.focus();
        WinPrint.print();
        WinPrint.close();

    }
</script>

</html>
