<html>
        <head>
        </head>
        <body>
            <h3><b>Tes kirim email setelah registrasi user<b></h3>
            <br />
            Dear Admin,
                <br />There is new registered user. Please check the verification page by following the link below:
                <br />
                <?php
                    echo CHtml::link('Verification Page', array(Yii::app()->baseUrl.'user/admin'))
                ?>
                <br />
        </body>
</html>