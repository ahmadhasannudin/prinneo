<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>
<style>
    .standard-btn {
        text-decoration: none;
        border: 2px solid black;
        border-radius: 2px;
        color: black;
        background-color: #fcef00;
    }

    .btn-lg {
        padding: 15px 40px 15px 40px;
        margin-bottom: 100px;
    }
</style>
</head>

<body>
    <table>
        <tr>
            <td>
                <center>
                    <img src="https://prinneo.com/assets/images/home/fbf8f3f5260adc695f1410f5d02897b7.png">
                    <h2>Hallo, <?php echo $user_name ?></h2> <br>
                </center>
            </td>
        </tr>

        <tr>
            <td>
                <p>Kami telah menerima pendaftaran Akun Anda di <a href="https://prinneo.com">Prinneo.com</a>. Segera konfirmasi e-mail anda dengan klik tautan ini</p>
            </td>
        </tr>
        <tr>
            <td>
                <center>
                    <a href="<?= str_replace('&amp;', '&', base_url() . '/login/activate_account?email=' . $user_email . '&code=' . $confirmation_code); ?>" class="standard-btn btn-lg mb-5">Aktivasi Akun Sekarang</a>
                </center>
            </td>
        </tr>
        <tr>
            <td>
                <p></p>
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