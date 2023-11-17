<!doctype html>
<html>

<head>
    <meta name="robots" content="noindex">
    <title>Terjadi Kesalahan</title>
    <style>
        <?= preg_replace('#[\r\n\t ]+#', ' ', file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'debug.css')) ?>
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @import url(https://fonts.googleapis.com/css?family=Roboto:400,100,300,500);

        body {
            background-color: #73879C;
            color: #fff;
            font-size: 100%;
            line-height: 1;
            font-family: "Roboto", sans-serif;
        }

        p {
            font-size: 2em;
            text-align: center;
            font-weight: 100;
        }

        .quotething {
            font-size: 1em;
            text-align: center;
            font-weight: 100;
        }

        h1 {
            text-align: center;
            font-size: 4em;
            font-weight: 600;
            text-shadow: #4D5D70 1px 1px, #4D5D70 2px 2px, #4D5D70 3px 3px, #4D5D70 4px 4px, #4D5D70 5px 5px, #4D5D70 6px 6px, #4D5D70 7px 7px, #4D5D70 8px 8px, #4D5D70 9px 9px, #4D5D70 10px 10px, #4D5D70 11px 11px, #4D5D70 12px 12px, #4D5D70 13px 13px, #4D5D70 14px 14px, #4D5D70 15px 15px, #4D5D70 16px 16px, #4D5D70 17px 17px, #4D5D70 18px 18px, #4D5D70 19px 19px, #4D5D70 20px 20px, #4D5D70 21px 21px, #4D5D70 22px 22px, #4D5D70 23px 23px, #4D5D70 24px 24px, #4D5D70 25px 25px, #4D5D70 26px 26px, #4D5D70 27px 27px, #4D5D70 28px 28px, #4D5D70 29px 29px, #4D5D70 30px 30px, #4D5D70 31px 31px, #4D5D70 32px 32px, #4D5D70 33px 33px, #4D5D70 34px 34px, #4D5D70 35px 35px, #4D5D70 36px 36px, #4D5D70 37px 37px, #4D5D70 38px 38px, #4D5D70 39px 39px, #4D5D70 40px 40px, #4D5D70 41px 41px, #4D5D70 42px 42px, #4D5D70 43px 43px, #4D5D70 44px 44px, #4D5D70 45px 45px, #4D5D70 46px 46px, #4D5D70 47px 47px, #4D5D70 48px 48px, #4D5D70 49px 49px, #4D5D70 50px 50px, #4D5D70 51px 51px, #4D5D70 52px 52px, #4D5D70 53px 53px, #4D5D70 54px 54px, #4D5D70 55px 55px, #4D5D70 56px 56px, #4D5D70 57px 57px, #4D5D70 58px 58px, #4D5D70 59px 59px, #4D5D70 60px 60px, #4D5D70 61px 61px, #4D5D70 62px 62px, #4D5D70 63px 63px, #4D5D70 64px 64px, #4D5D70 65px 65px, #4D5D70 66px 66px, #4D5D70 67px 67px, #4D5D70 68px 68px, #4D5D70 69px 69px, #4D5D70 70px 70px, #4D5D70 71px 71px, #4D5D70 72px 72px, #4D5D70 73px 73px, #4D5D70 74px 74px, #4D5D70 75px 75px, #4D5D70 76px 76px, #4D5D70 77px 77px, #4D5D70 78px 78px, #4D5D70 79px 79px, #4D5D70 80px 80px, #4D5D70 81px 81px, #4D5D70 82px 82px, #4D5D70 83px 83px, #4D5D70 84px 84px, #4D5D70 85px 85px, #4D5D70 86px 86px, #4D5D70 87px 87px, #4D5D70 88px 88px, #4D5D70 89px 89px, #4D5D70 90px 90px, #4D5D70 91px 91px, #4D5D70 92px 92px, #4D5D70 93px 93px, #4D5D70 94px 94px, #4D5D70 95px 95px, #4D5D70 96px 96px, #4D5D70 97px 97px, #4D5D70 98px 98px, #4D5D70 99px 99px, #4D5D70 100px 100px, #4D5D70 101px 101px, #4D5D70 102px 102px, #4D5D70 103px 103px, #4D5D70 104px 104px, #4D5D70 105px 105px, #4D5D70 106px 106px, #4D5D70 107px 107px, #4D5D70 108px 108px, #4D5D70 109px 109px, #4D5D70 110px 110px, #4D5D70 111px 111px, #4D5D70 112px 112px, #4D5D70 113px 113px, #4D5D70 114px 114px, #4D5D70 115px 115px, #4D5D70 116px 116px, #4D5D70 117px 117px, #4D5D70 118px 118px, #4D5D70 119px 119px, #4D5D70 120px 120px, #4D5D70 121px 121px, #4D5D70 122px 122px, #4D5D70 123px 123px, #4D5D70 124px 124px, #4D5D70 125px 125px, #4D5D70 126px 126px, #4D5D70 127px 127px, #4D5D70 128px 128px, #4D5D70 129px 129px, #4D5D70 130px 130px, #4D5D70 131px 131px, #4D5D70 132px 132px, #4D5D70 133px 133px, #4D5D70 134px 134px, #4D5D70 135px 135px, #4D5D70 136px 136px, #4D5D70 137px 137px, #4D5D70 138px 138px, #4D5D70 139px 139px, #4D5D70 140px 140px, #4D5D70 141px 141px, #4D5D70 142px 142px, #4D5D70 143px 143px, #4D5D70 144px 144px, #4D5D70 145px 145px, #4D5D70 146px 146px, #4D5D70 147px 147px, #4D5D70 148px 148px, #4D5D70 149px 149px, #4D5D70 150px 150px, #4D5D70 151px 151px, #4D5D70 152px 152px, #4D5D70 153px 153px, #4D5D70 154px 154px, #4D5D70 155px 155px, #4D5D70 156px 156px, #4D5D70 157px 157px, #4D5D70 158px 158px, #4D5D70 159px 159px, #4D5D70 160px 160px, #4D5D70 161px 161px, #4D5D70 162px 162px, #4D5D70 163px 163px, #4D5D70 164px 164px, #4D5D70 165px 165px, #4D5D70 166px 166px, #4D5D70 167px 167px, #4D5D70 168px 168px, #4D5D70 169px 169px, #4D5D70 170px 170px, #4D5D70 171px 171px, #4D5D70 172px 172px, #4D5D70 173px 173px, #4D5D70 174px 174px, #4D5D70 175px 175px, #4D5D70 176px 176px, #4D5D70 177px 177px, #4D5D70 178px 178px, #4D5D70 179px 179px, #4D5D70 180px 180px, #4D5D70 181px 181px, #4D5D70 182px 182px, #4D5D70 183px 183px, #4D5D70 184px 184px, #4D5D70 185px 185px, #4D5D70 186px 186px, #4D5D70 187px 187px, #4D5D70 188px 188px, #4D5D70 189px 189px, #4D5D70 190px 190px, #4D5D70 191px 191px, #4D5D70 192px 192px, #4D5D70 193px 193px, #4D5D70 194px 194px, #4D5D70 195px 195px, #4D5D70 196px 196px, #4D5D70 197px 197px, #4D5D70 198px 198px, #4D5D70 199px 199px, #4D5D70 200px 200px;
        }

        .button404 {
            text-align: center;
            display: inline-block;
            -webkit-box-sizing: content-box;
            -moz-box-sizing: content-box;
            box-sizing: content-box;
            cursor: pointer;
            margin: 1px;
            padding: 12px 30px;
            border: 1px solid #ffffff;
            -webkit-border-radius: 3px;
            border-radius: 3px;
            font: normal 13px/normal "Roboto", Times, serif;
            color: #73879C;
            -o-text-overflow: clip;
            text-overflow: clip;
            background: rgba(255, 255, 255, 1);
            -webkit-transition: all 300ms cubic-bezier(0.42, 0, 0.58, 1);
            -moz-transition: all 300ms cubic-bezier(0.42, 0, 0.58, 1);
            -o-transition: all 300ms cubic-bezier(0.42, 0, 0.58, 1);
            transition: all 300ms cubic-bezier(0.42, 0, 0.58, 1);
        }

        .button404:hover {
            color: rgba(255, 255, 255, 1);
            background: rgba(255, 255, 255, 0);
        }
    </style>
    <title>Terjadi Kesalahan</title>
    <link rel="shortcut icon" type="image/png/jpg" href="<?= base_url() ?>/gentelella-master/production/images/HIMASI.png">
</head>

<body>
    <br><br><br><br><br><br><br><br><br><br><br><br><br>
    <h1>Terjadi Kesalahan</h1>
    <p>Sepertinya aksi yang anda lakukan terjadi kesalahan</p>
    <p class="quotething"> “It looks like the action you took occurred in error” </p><br>
    <div align="center"> <a href="<?= base_url('index'); ?>"><input type="button" class="button404" value="Kembali" /></a> </div>
</body>

</html>