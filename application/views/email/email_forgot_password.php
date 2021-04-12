<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>
</head>

<body>
    <table>
        <tr>
            <td>
                <center>
                    <img src="https://prinneo.com/assets/images/home/fbf8f3f5260adc695f1410f5d02897b7.png">
                    <h2>Hallo, <?php echo $nama_lengkap ?></h2> <br>
                </center>
            </td>
        </tr>

        <tr>
            <td>
                <p>Anda bisa melakukan perubahan password di <a href="<?= str_replace('&amp;', '&', base_url() . '/login/new_password?email=' . $email . '&code=' . $confirmation_code); ?>">Ubah Password</a></p>
            </td>
        </tr>
        <tr>
            <td style='background-color:#fcef00;' class='p-2'>
                <center>
                    <p class='align-center'>
                        Copyright &copy Prinneo 2020 All Rights Reserved
                    </p>
                </center>
            </td>
        </tr>
    </table>
</body>