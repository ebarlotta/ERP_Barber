<!DOCTYPE html>
<html lang="zxx">

<head>
    <style class="vjs-styles-defaults">
        .video-js {
            width: 300px;
            height: 150px;
        }
        
        .vjs-fluid {
            padding-top: 56.25%
        }
    </style>
    <style class="vjs-styles-dimensions">
        .vdo_ai_6874530-dimensions {
            width: 800px;
            height: 450px;
        }
        
        .vdo_ai_6874530-dimensions.vjs-fluid {
            padding-top: 56.25%;
        }
    </style>
    <title>Grocery Shoppy an Ecommerce Category Bootstrap Responsive Web Template | Checkout :: w3layouts</title>
    <!--/tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="keywords" content="Grocery Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design">
    <script src="checkout_archivos/client.js" async="" type="text/javascript"></script>
    <script type="text/javascript" id="www-widgetapi-script" src="checkout_archivos/www-widgetapi.js" async=""></script>
    <script src="checkout_archivos/iframe_api"></script>
    <script async="" src="checkout_archivos/analytics.js"></script>
    <script type="text/javascript" async="" src="checkout_archivos/analytics.js"></script>
    <script type="text/javascript" async="" src="checkout_archivos/js_002.js"></script>
    <script type="text/javascript" async="" src="checkout_archivos/analytics.js"></script>

    <!--//tags -->
    <link href="checkout_archivos/bootstrap.css" rel="stylesheet" type="text/css" media="all">
    <link href="checkout_archivos/style.css" rel="stylesheet" type="text/css" media="all">
    <link href="checkout_archivos/font-awesome_002.css" rel="stylesheet">
    <!--pop-up-box-->
    <link href="checkout_archivos/popuo-box.css" rel="stylesheet" type="text/css" media="all">
    <!--//pop-up-box-->
    <!-- price range -->
    <link rel="stylesheet" type="text/css" href="checkout_archivos/jquery-ui1.css">
    <!-- fonts -->
    <link href="checkout_archivos/css.css" rel="stylesheet">

    <style type="text/css">
        @keyframes pop-in {
            0% {
                opacity: 0;
                transform: scale(0.1);
            }
            60% {
                opacity: 1;
                transform: scale(1.2);
            }
            100% {
                transform: scale(1);
            }
        }
        
        @-webkit-keyframes pop-in {
            0% {
                opacity: 0;
                -webkit-transform: scale(0.1);
            }
            60% {
                opacity: 1;
                -webkit-transform: scale(1.2);
            }
            100% {
                -webkit-transform: scale(1);
            }
        }
        
        @-moz-keyframes pop-in {
            0% {
                opacity: 0;
                -moz-transform: scale(0.1);
            }
            60% {
                opacity: 1;
                -moz-transform: scale(1.2);
            }
            100% {
                -moz-transform: scale(1);
            }
        }
        
        .minicartk-showing #PPminicartk {
            display: block;
            transform: translateZ(0);
            -webkit-transform: translateZ(0);
            -moz-transform: translateZ(0);
            animation: pop-in 0.25s;
            -webkit-animation: pop-in 0.25s;
            -moz-animation: pop-in 0.25s;
        }
        
        #PPminicartk {
            display: none;
            position: fixed;
            left: 50%;
            top: 75px;
        }
        
        #PPminicartk form {
            position: relative;
            width: 400px;
            max-height: 400px;
            margin-left: -200px;
            padding: 10px 10px 40px;
            background: #fbfbfb;
            border: 1px solid #d7d7d7;
            border-radius: 4px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);
            font: 15px/normal arial, helvetica;
            color: #333;
        }
        
        #PPminicartk form.minicartk-empty {
            padding-bottom: 10px;
            font-size: 16px;
            font-weight: bold;
        }
        
        #PPminicartk ul {
            clear: both;
            float: left;
            width: 380px;
            margin: 5px 0 20px;
            padding: 10px;
            list-style-type: none;
            background: #fff;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);
        }
        
        #PPminicartk .minicartk-empty ul {
            display: none;
        }
        
        #PPminicartk .minicartk-closer {
            float: right;
            margin: -12px -10px 0;
            padding: 10px;
            background: 0;
            border: 0;
            font-size: 18px;
            cursor: pointer;
            font-weight: bold;
        }
        
        #PPminicartk .minicartk-item {
            clear: left;
            padding: 6px 0;
            min-height: 25px;
        }
        
        #PPminicartk .minicartk-item+.minicartk-item {
            border-top: 1px solid #f2f2f2;
        }
        
        #PPminicartk .minicartk-item a {
            color: #333;
            text-decoration: none;
        }
        
        #PPminicartk .minicartk-details-name {
            float: left;
            width: 62%;
        }
        
        #PPminicartk .minicartk-details-quantity {
            float: left;
            width: 15%;
        }
        
        #PPminicartk .minicartk-details-remove {
            float: left;
            width: 7%;
        }
        
        #PPminicartk .minicartk-details-price {
            float: left;
            width: 16%;
            text-align: right;
        }
        
        #PPminicartk .minicartk-attributes {
            margin: 0;
            padding: 0;
            background: transparent;
            border: 0;
            border-radius: 0;
            box-shadow: none;
            color: #999;
            font-size: 12px;
            line-height: 22px;
        }
        
        #PPminicartk .minicartk-attributes li {
            display: inline;
        }
        
        #PPminicartk .minicartk-attributes li:after {
            content: ",";
        }
        
        #PPminicartk .minicartk-attributes li:last-child:after {
            content: "";
        }
        
        #PPminicartk .minicartk-quantity {
            width: 30px;
            height: 18px;
            padding: 2px 4px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
            font-size: 13px;
            text-align: right;
            transition: border linear 0.2s, box-shadow linear 0.2s;
            -webkit-transition: border linear 0.2s, box-shadow linear 0.2s;
            -moz-transition: border linear 0.2s, box-shadow linear 0.2s;
        }
        
        #PPminicartk .minicartk-quantity:hover {
            border-color: #0078C1;
        }
        
        #PPminicartk .minicartk-quantity:focus {
            border-color: #0078C1;
            outline: 0;
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 3px rgba(0, 120, 193, 0.4);
        }
        
        #PPminicartk .minicartk-remove {
            width: 18px;
            height: 19px;
            margin: 2px 0 0;
            padding: 0;
            background: #b7b7b7;
            border: 1px solid #a3a3a3;
            border-radius: 3px;
            color: #fff;
            font-size: 13px;
            opacity: 0.70;
            cursor: pointer;
        }
        
        #PPminicartk .minicartk-remove:hover {
            opacity: 1;
        }
        
        #PPminicartk .minicartk-footer {
            clear: left;
        }
        
        #PPminicartk .minicartk-subtotal {
            position: absolute;
            bottom: 17px;
            padding-left: 6px;
            left: 10px;
            font-size: 16px;
            font-weight: bold;
        }
        
        #PPminicartk .minicartk-submit {
            position: absolute;
            bottom: 10px;
            right: 10px;
            min-width: 153px;
            height: 33px;
            margin-right: 6px;
            padding: 0 9px;
            border: 1px solid #ffc727;
            border-radius: 5px;
            color: #000;
            text-shadow: 1px 1px 1px #fff6e9;
            cursor: pointer;
            background: #ffaa00;
            background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2ZmZjZlOSIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiNmZmFhMDAiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
            background: -moz-linear-gradient(top, #fff6e9 0%, #ffaa00 100%);
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #fff6e9), color-stop(100%, #ffaa00));
            background: -webkit-linear-gradient(top, #fff6e9 0%, #ffaa00 100%);
            background: -o-linear-gradient(top, #fff6e9 0%, #ffaa00 100%);
            background: -ms-linear-gradient(top, #fff6e9 0%, #ffaa00 100%);
            background: linear-gradient(to bottom, #fff6e9 0%, #ffaa00 100%);
        }
        
        #PPminicartk .minicartk-submit img {
            vertical-align: middle;
            padding: 4px 0 0 2px;
        }
    </style>

    <style>
        .vdo-js .vjs-big-play-button .vjs-icon-placeholder:before,
        .vdo-js .vjs-modal-dialog,
        .vjs-button>.vjs-icon-placeholder:before,
        .vjs-modal-dialog .vjs-modal-dialog-content {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%
        }
        
        .vdo-js .vjs-big-play-button .vjs-icon-placeholder:before,
        .vjs-button>.vjs-icon-placeholder:before {
            text-align: center
        }
        
        @font-face {
            font-family: VideoJS;
            src: url(data:application/font-woff;charset=utf-8;base64,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) format("woff"), url(data:application/x-font-ttf;charset=utf-8;base64,AAEAAAALAIAAAwAwR1NVQiCLJXoAAAE4AAAAVE9TLzJRiV3RAAABjAAAAFZjbWFwOfT3xgAAAmgAAAMiZ2x5ZgMJ0sMAAAXQAAARCGhlYWQSy2hLAAAA4AAAADZoaGVhDgMHIQAAALwAAAAkaG10eOAAAAAAAAHkAAAAhGxvY2E9NEHGAAAFjAAAAERtYXhwATIAgQAAARgAAAAgbmFtZdXH9aAAABbYAAACCnBvc3RAAl/0AAAY5AAAAZ4AAQAABwAAAAAABwAAAP//BwEAAQAAAAAAAAAAAAAAAAAAACEAAQAAAAEAAFYfTwlfDzz1AAsHAAAAAADWVg6nAAAAANZWDqcAAAAABwEHAAAAAAgAAgAAAAAAAAABAAAAIQB1AAcAAAAAAAIAAAAKAAoAAAD/AAAAAAAAAAEAAAAKADAAPgACREZMVAAObGF0bgAaAAQAAAAAAAAAAQAAAAQAAAAAAAAAAQAAAAFsaWdhAAgAAAABAAAAAQAEAAQAAAABAAgAAQAGAAAAAQAAAAEGygGQAAUAAARxBOYAAAD6BHEE5gAAA1wAVwHOAAACAAUDAAAAAAAAAAAAAAAAAAAAAAAAAAAAAFBmRWQAQPEB8SAHAAAAAKEHAAAAAAAAAQAAAAAAAAAAAAAHAAAABwAAAAcAAAAHAAAABwAAAAcAAAAHAAAABwAAAAcAAAAHAAAABwAAAAcAAAAHAAAABwAAAAcAAAAHAAAABwAAAAcAAAAHAAAABwAAAAcAAAAHAAAABwAAAAcAAAAHAAAABwAAAAcAAAAHAAAABwAAAAcAAAAHAAAABwAAAAAAAAUAAAADAAAALAAAAAQAAAGSAAEAAAAAAIwAAwABAAAALAADAAoAAAGSAAQAYAAAAAQABAABAADxIP//AADxAf//AAAAAQAEAAAAAQACAAMABAAFAAYABwAIAAkACgALAAwADQAOAA8AEAARABIAEwAUABUAFgAXABgAGQAaABsAHAAdAB4AHwAgAAABBgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAMAAAAAAGQAAAAAAAAACAAAPEBAADxAQAAAAEAAPECAADxAgAAAAIAAPEDAADxAwAAAAMAAPEEAADxBAAAAAQAAPEFAADxBQAAAAUAAPEGAADxBgAAAAYAAPEHAADxBwAAAAcAAPEIAADxCAAAAAgAAPEJAADxCQAAAAkAAPEKAADxCgAAAAoAAPELAADxCwAAAAsAAPEMAADxDAAAAAwAAPENAADxDQAAAA0AAPEOAADxDgAAAA4AAPEPAADxDwAAAA8AAPEQAADxEAAAABAAAPERAADxEQAAABEAAPESAADxEgAAABIAAPETAADxEwAAABMAAPEUAADxFAAAABQAAPEVAADxFQAAABUAAPEWAADxFgAAABYAAPEXAADxFwAAABcAAPEYAADxGAAAABgAAPEZAADxGQAAABkAAPEaAADxGgAAABoAAPEbAADxGwAAABsAAPEcAADxHAAAABwAAPEdAADxHQAAAB0AAPEeAADxHgAAAB4AAPEfAADxHwAAAB8AAPEgAADxIAAAACAAAAAAAAAADgBoAH4AzADgAQIBQgFsAZgBwgIYAlgCtALgAzADsAPeBDAElgTcBSQFZgWKBiAGZga0BuoHWAgSCFgIbgiEAAEAAAAABYsFiwACAAABEQECVQM2BYv76gILAAADAAAAAAZrBmsAAgAbADQAAAkCEyIHDgEHBhAXHgEXFiA3PgE3NhAnLgEnJgMiJy4BJyY0Nz4BNzYyFx4BFxYUBw4BBwYC6wHA/kCVmIuGzjk7OznOhosBMIuGzjk7OznOhouYeW9rpi0vLy2ma2/yb2umLS8vLaZrbwIwAVABUAGbOznOhov+0IuGzjk7OznOhosBMIuGzjk7+sAvLaZrb/Jva6YtLy8tpmtv8m9rpi0vAAACAAAAAAVABYsAAwAHAAABIREpAREhEQHAASv+1QJVASsBdQQW++oEFgAAAAQAAAAABiEGIAAHABcAJwAqAAABNCcmJxUXNjcUBxc2NTQnLgEnFR4BFxYBBwEhESEBEQEGBxU2Nxc3AQcXBNA0MlW4A7spcU1FQ+6VbKovMfu0XwFh/p8BKwF1AT5QWZl6mV/9YJycA4BhUlAqpbgYGGNicZKknYyHvSKaIJNlaQIsX/6f/kD+iwH2/sI9G5ojZJhfBJacnAAAAAEAAAAABKsF1gAFAAABESEBEQECCwEqAXb+igRg/kD+iwSq/osAAAACAAAAAAVmBdYACAAOAAABNCcmJxE2NzYBESEBEQEFZTQyVFQyNPwQASsBdf6LA4BhUlAq/aYqUFIBQf5A/osEqv6LAAMAAAAABiAGDwAFAA4AIgAAExEhAREBBTQnJicRNjc2AxUeARcWFAcOAQcVPgE3NhAnLgHgASsBdf6LAsU0MlVVMjS7bKovMTEvqmyV7kNFRUPuBGD+QP6LBKr+i+BhUlAq/aYqUFIC8Jogk2Vp6GllkyCaIr2HjAE6jIe9AAAABAAAAAAFiwWLAAUACwARABcAAAEjESE1IwMzNTM1IQEjFSERIwMVMxUzEQILlgF24JaW4P6KA4DgAXaW4OCWAuv+ipYCCuCW/ICWAXYCoJbgAXYABAAAAAAFiwWLAAUACwARABcAAAEzFTMRIRMjFSERIwEzNTM1IRM1IxEhNQF14Jb+iuDgAXaWAcCW4P6KlpYBdgJV4AF2AcCWAXb76uCWAcDg/oqWAAAAAAIAAAAABdYF1gATABcAAAEhIg4BFREUHgEzITI+ATURNC4BAyERIQVA/IApRCgoRCkDgClEKChEKfyAA4AF1ShEKfyAKUQoKEQpA4ApRCj76wOAAAYAAAAABmsGawAIAA0AFQAeACMALAAACQEmIyIHBgcBJS4BJwEFIQE2NzY1NAUBBgcGFRQXIQUeARcBMwEWMzI3NjcBAr4BZFJQhHt2YwESA44z7Z/+7gLl/dABel0zNfwS/t1dMzUPAjD95DPtnwESeP7dU0+Ee3Zj/u4D8AJoEy0rUf4nd6P6PP4nS/1zZn+Ej0tLAfhmf4SPS0pLo/o8Adn+CBMtK1EB2QAFAAAAAAZrBdYAEwAXABsAHwAjAAABISIOARURFB4BMyEyPgE1ETQuAQEhFSEBITUhBSE1ITUhNSEF1ftWKUUoKEUpBKopRSgoRfstASr+1gLq/RYC6gHA/tYBKv0WAuoF1ShEKfyAKUQoKEQpA4ApRCj9q5X+1ZWVlZaVAAAAAAMAAAAABiAF1gATACsAQwAAASEiDgEVERQeATMhMj4BNRE0LgEBIzUjFTM1MxUUBisBIiY1ETQ2OwEyFhUFIzUjFTM1MxUUBisBIiY1ETQ2OwEyFhUFi/vqKEUoKEUoBBYoRSgoRf2CcJWVcCsf4B8sLB/gHysCC3CVlXAsH+AfKysf4B8sBdUoRCn8gClEKChEKQOAKUQo/fYl4CVKHywsHwEqHywsH0ol4CVKHywsHwEqHywsHwAGAAAAAAYgBPYAAwAHAAsADwATABcAABMzNSMRMzUjETM1IwEhNSERITUhERUhNeCVlZWVlZUBKwQV++sEFfvrBBUDNZb+QJUBwJX+QJb+QJUCVZWVAAAAAQAAAAAGIQZsADEAAAEiBgcBNjQnAR4BMzI+ATQuASIOARUUFwEuASMiDgEUHgEzMjY3AQYVFB4BMj4BNC4BBUAqSx797AcHAg8eTys9Zzw8Z3pnPAf98R5PKz1nPDxnPStPHgIUBjtkdmQ7O2QCTx4cATcbMhsBNB0gPGd6Zzw8Zz0ZG/7NHCA8Z3pnPCAc/soZGDtkOjpkdmQ7AAAAAAIAAAAABlkGawBDAFAAAAE2NCc3PgEnAy4BDwEmLwEuASMhIgYPAQYHJyYGBwMGFh8BBhQXBw4BFxMeAT8BFh8BHgEzITI2PwE2NxcWNjcTNiYnBSIuATQ+ATIeARQOAQWrBQWeCgYHlgcaDLo8QhwDFQ7+1g4VAhxEOroNGgeVBwULnQUFnQsFB5UHGg26O0McAhUOASoOFQIcRDq6DRoHlQcFC/04R3hGRniOeEZGeAM3Kj4qewkbDAEDDAkFSy4bxg4SEg7GHC1LBQkM/v0MGwl7Kj4qewkbDP79DAkFSy4bxg4SEg7GHC1LBQkMAQMMGwlBRniOeEZGeI54RgABAAAAAAZrBmsAGAAAExQXHgEXFiA3PgE3NhAnLgEnJiAHDgEHBpU7Oc6GiwEwi4bOOTs7Oc6Gi/7Qi4bOOTsDgJiLhs45Ozs5zoaLATCLhs45Ozs5zoaLAAAAAAIAAAAABmsGawAYADEAAAEiBw4BBwYQFx4BFxYgNz4BNzYQJy4BJyYDIicuAScmNDc+ATc2MhceARcWFAcOAQcGA4CYi4bOOTs7Oc6GiwEwi4bOOTs7Oc6Gi5h5b2umLS8vLaZrb/Jva6YtLy8tpmtvBms7Oc6Gi/7Qi4bOOTs7Oc6GiwEwi4bOOTv6wC8tpmtv8m9rpi0vLy2ma2/yb2umLS8AAwAAAAAGawZrABgAMQA+AAABIgcOAQcGEBceARcWIDc+ATc2ECcuAScmAyInLgEnJjQ3PgE3NjIXHgEXFhQHDgEHBhMUDgEiLgE0PgEyHgEDgJiKhs85Ozs5z4aKATCKhs85Ozs5z4aKmHlva6YtLy8tpmtv8m9rpi0vLy2ma29nPGd6Zzw8Z3pnPAZrOznPhor+0IqGzzk7OznPhooBMIqGzzk7+sAvLaZrb/Jva6YtLy8tpmtv8m9rpi0vAlU9Zzw8Z3pnPDxnAAAABAAAAAAGIAYhABMAHwApAC0AAAEhIg4BFREUHgEzITI+ATURNC4BASM1IxUjETMVMzU7ASEyFhURFAYjITczNSMFi/vqKEUoKEUoBBYoRSgoRf2CcJVwcJVwlgEqHywsH/7WcJWVBiAoRSj76ihFKChFKAQWKEUo/ICVlQHAu7ssH/7WHyxw4AAAAAACAAAAAAZrBmsAGAAkAAABIgcOAQcGEBceARcWIDc+ATc2ECcuAScmEwcJAScJATcJARcBA4CYi4bOOTs7Oc6GiwEwi4bOOTs7Oc6Gi91p/vT+9GkBC/71aQEMAQxp/vUGazs5zoaL/tCLhs45Ozs5zoaLATCLhs45O/wJaQEL/vVpAQwBDGn+9QELaf70AAABAAAAAAXWBrYAJwAAAREJAREyFxYXFhQHBgcGIicmJyY1IxQXHgEXFjI3PgE3NjQnLgEnJgOA/osBdXpoZjs9PTtmaPRoZjs9lS8tpWtv9G9rpS0vLy2la28FiwEq/ov+iwEqPTtmaPNpZTw9PTxlaXl5b2umLS8vLaZrb/Nva6UuLwABAAAAAAU/BwAAFAAAAREjIgYdASEDIxEhESMRMzU0NjMyBT+dVjwBJSf+/s7//9Ctkwb0/vhISL3+2P0JAvcBKNq6zQAAAAAEAAAAAAaOBwAAMABFAGAAbAAAARQeAxUUBwYEIyImJyY1NDY3NiUuATU0NwYjIiY1NDY3PgEzIQcjHgEVFA4DJzI2NzY1NC4CIyIGBwYVFB4DEzI+AjU0LgEvASYvAiYjIg4DFRQeAgEzFSMVIzUjNTM1MwMfQFtaQDBI/uqfhOU5JVlKgwERIB8VLhaUy0g/TdNwAaKKg0pMMUVGMZImUBo1Ij9qQCpRGS8UKz1ZNjprWzcODxMeChwlThAgNWhvUzZGcX0Da9XVadTUaQPkJEVDUIBOWlN6c1NgPEdRii5SEipAKSQxBMGUUpo2QkBYP4xaSHNHO0A+IRs5ZjqGfVInITtlLmdnUjT8lxo0Xj4ZMCQYIwsXHTgCDiQ4XTtGazsdA2xs29ts2QADAAAAAAaABmwAAwAOACoAAAERIREBFgYrASImNDYyFgERIRE0JiMiBgcGFREhEhAvASEVIz4DMzIWAd3+tgFfAWdUAlJkZ6ZkBI/+t1FWP1UVC/63AgEBAUkCFCpHZz+r0ASP/CED3wEySWJik2Fh/N39yAISaXdFMx4z/dcBjwHwMDCQIDA4H+MAAAEAAAAABpQGAAAxAAABBgcWFRQCDgEEIyAnFjMyNy4BJxYzMjcuAT0BFhcuATU0NxYEFyY1NDYzMhc2NwYHNgaUQ18BTJvW/tKs/vHhIyvhsGmmHyEcKypwk0ROQk4seQFbxgi9hoxgbWAlaV0FaGJFDhyC/v3ut22RBIoCfWEFCxexdQQmAyyOU1hLlbMKJiSGvWYVOXM/CgAAAAEAAAAABYAHAAAiAAABFw4BBwYuAzURIzU+BDc+ATsBESEVIREUHgI3NgUwUBewWWitcE4hqEhyRDAUBQEHBPQBTf6yDSBDME4Bz+0jPgECOFx4eDoCINcaV11vVy0FB/5Y/P36HjQ1HgECAAEAAAAABoAGgABKAAABFAIEIyInNj8BHgEzMj4BNTQuASMiDgMVFBYXFj8BNjc2JyY1NDYzMhYVFAYjIiY3PgI1NCYjIgYVFBcDBhcmAjU0EiQgBBIGgM7+n9FvazsTNhRqPXm+aHfijmm2f1srUE0eCAgGAgYRM9Gpl6mJaz1KDgglFzYyPlYZYxEEzv7OAWEBogFhzgOA0f6fziBdR9MnOYnwlnLIfjpgfYZDaJ4gDCAfGAYXFD1al9mkg6ruVz0jdVkfMkJyVUkx/l5Ga1sBfOnRAWHOzv6fAAAHAAAAAAcBBM8AFwAhADgATwBmAHEAdAAAAREzNhcWFxYXFhcWBw4BBwYHBicmLwEmNxY2NzYuAQcRFAUWNzY/ATY3NjU2JyMGFxYfARYXFhcUFxY3Nj8BNjc2NzYnIwYXFh8BFhcWFRYXFjc2PwE2NzY3NicjBhcWHwEWFxYVFgUzPwEVMxEjBgsBARUnAxwcaC5MND0sTSsvCgdVREdTNWg1KgECq1JrCQcwYkABfhoSCxAKJBQXAX4dAQMCBgMnFxsBJBoSCxAKJBQWAQF+HgEEAgUEJxcbASMZEwsQCiQUFgEBfh4BBAIFBCcXGwH5Q+5B4arNDfHvAhaOAckC/QIBAwwPHzdcZXlZmC8xCAQBAQIDBMIDVkxCZDQF/pUHwgcTCyAUQEdPU8etCAgFCQZHTFxbwLoHEwsgFEBHT1PHrQgIBQkGR0xcW8C6BxMLIBRAR09Tx60ICAUJBkdMXFvAwGQBZQMMFf6D/oYB/fkBAAABAAAAAAYhBrYALAAAASIHDgEHBhURFB4BOwERITU0Nz4BNzYyFx4BFxYdASERMzI+ATURNCcuAScmA4CJfXi6MzU8Zz3g/tUpKJFeYdRhXpEoKf7V4D1nPDUzunh9BrU0M7t4fYn99j1nPAJVlWthXpAoKSkokF5ha5X9qzxnPQIKiX14uzM0AAAAAAIAAAAABUAFQAACAAYAAAkCIREzEQHAAnv9hQLrlQHAAcABwPyAA4AAAAAAAgAAAAAFQAVAAAMABgAAATMRIwkBEQHAlZUBBQJ7BUD8gAHA/kADgAAAAAAAABAAxgABAAAAAAABAAcAAAABAAAAAAACAAcABwABAAAAAAADAAcADgABAAAAAAAEAAcAFQABAAAAAAAFAAsAHAABAAAAAAAGAAcAJwABAAAAAAAKACsALgABAAAAAAALABMAWQADAAEECQABAA4AbAADAAEECQACAA4AegADAAEECQADAA4AiAADAAEECQAEAA4AlgADAAEECQAFABYApAADAAEECQAGAA4AugADAAEECQAKAFYAyAADAAEECQALACYBHlZpZGVvSlNSZWd1bGFyVmlkZW9KU1ZpZGVvSlNWZXJzaW9uIDEuMFZpZGVvSlNHZW5lcmF0ZWQgYnkgc3ZnMnR0ZiBmcm9tIEZvbnRlbGxvIHByb2plY3QuaHR0cDovL2ZvbnRlbGxvLmNvbQBWAGkAZABlAG8ASgBTAFIAZQBnAHUAbABhAHIAVgBpAGQAZQBvAEoAUwBWAGkAZABlAG8ASgBTAFYAZQByAHMAaQBvAG4AIAAxAC4AMABWAGkAZABlAG8ASgBTAEcAZQBuAGUAcgBhAHQAZQBkACAAYgB5ACAAcwB2AGcAMgB0AHQAZgAgAGYAcgBvAG0AIABGAG8AbgB0AGUAbABsAG8AIABwAHIAbwBqAGUAYwB0AC4AaAB0AHQAcAA6AC8ALwBmAG8AbgB0AGUAbABsAG8ALgBjAG8AbQAAAAIAAAAAAAAAEQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIQECAQMBBAEFAQYBBwEIAQkBCgELAQwBDQEOAQ8BEAERARIBEwEUARUBFgEXARgBGQEaARsBHAEdAR4BHwEgASEBIgAEcGxheQtwbGF5LWNpcmNsZQVwYXVzZQt2b2x1bWUtbXV0ZQp2b2x1bWUtbG93CnZvbHVtZS1taWQLdm9sdW1lLWhpZ2gQZnVsbHNjcmVlbi1lbnRlcg9mdWxsc2NyZWVuLWV4aXQGc3F1YXJlB3NwaW5uZXIJc3VidGl0bGVzCGNhcHRpb25zCGNoYXB0ZXJzBXNoYXJlA2NvZwZjaXJjbGUOY2lyY2xlLW91dGxpbmUTY2lyY2xlLWlubmVyLWNpcmNsZQJoZAZjYW5jZWwGcmVwbGF5CGZhY2Vib29rBWdwbHVzCGxpbmtlZGluB3R3aXR0ZXIGdHVtYmxyCXBpbnRlcmVzdBFhdWRpby1kZXNjcmlwdGlvbgVhdWRpbwluZXh0LWl0ZW0NcHJldmlvdXMtaXRlbQAAAAA=) format("truetype");
            font-weight: 400;
            font-style: normal
        }
        
        .vdo-js .vjs-big-play-button .vjs-icon-placeholder:before,
        .vdo-js .vjs-play-control .vjs-icon-placeholder,
        .vjs-icon-play {
            font-family: VideoJS;
            font-weight: 400;
            font-style: normal
        }
        
        .vdo-js .vjs-big-play-button .vjs-icon-placeholder:before,
        .vdo-js .vjs-play-control .vjs-icon-placeholder:before,
        .vjs-icon-play:before {
            content: "\f101"
        }
        
        .vjs-icon-play-circle {
            font-family: VideoJS;
            font-weight: 400;
            font-style: normal
        }
        
        .vjs-icon-play-circle:before {
            content: "\f102"
        }
        
        .vdo-js .vjs-play-control.vjs-playing .vjs-icon-placeholder,
        .vjs-icon-pause {
            font-family: VideoJS;
            font-weight: 400;
            font-style: normal
        }
        
        .vdo-js .vjs-play-control.vjs-playing .vjs-icon-placeholder:before,
        .vjs-icon-pause:before {
            content: "\f103"
        }
        
        .vdo-js .vjs-mute-control.vjs-vol-0 .vjs-icon-placeholder,
        .vjs-icon-volume-mute {
            font-family: VideoJS;
            font-weight: 400;
            font-style: normal
        }
        
        .vdo-js .vjs-mute-control.vjs-vol-0 .vjs-icon-placeholder:before,
        .vjs-icon-volume-mute:before {
            content: "\f104"
        }
        
        .vdo-js .vjs-mute-control.vjs-vol-1 .vjs-icon-placeholder,
        .vjs-icon-volume-low {
            font-family: VideoJS;
            font-weight: 400;
            font-style: normal
        }
        
        .vdo-js .vjs-mute-control.vjs-vol-1 .vjs-icon-placeholder:before,
        .vjs-icon-volume-low:before {
            content: "\f105"
        }
        
        .vdo-js .vjs-mute-control.vjs-vol-2 .vjs-icon-placeholder,
        .vjs-icon-volume-mid {
            font-family: VideoJS;
            font-weight: 400;
            font-style: normal
        }
        
        .vdo-js .vjs-mute-control.vjs-vol-2 .vjs-icon-placeholder:before,
        .vjs-icon-volume-mid:before {
            content: "\f106"
        }
        
        .vdo-js .vjs-mute-control .vjs-icon-placeholder,
        .vjs-icon-volume-high {
            font-family: VideoJS;
            font-weight: 400;
            font-style: normal
        }
        
        .vdo-js .vjs-mute-control .vjs-icon-placeholder:before,
        .vjs-icon-volume-high:before {
            content: "\f107"
        }
        
        .vdo-js .vjs-fullscreen-control .vjs-icon-placeholder,
        .vjs-icon-fullscreen-enter {
            font-family: VideoJS;
            font-weight: 400;
            font-style: normal
        }
        
        .vdo-js .vjs-fullscreen-control .vjs-icon-placeholder:before,
        .vjs-icon-fullscreen-enter:before {
            content: "\f108"
        }
        
        .vdo-js.vjs-fullscreen .vjs-fullscreen-control .vjs-icon-placeholder,
        .vjs-icon-fullscreen-exit {
            font-family: VideoJS;
            font-weight: 400;
            font-style: normal
        }
        
        .vdo-js.vjs-fullscreen .vjs-fullscreen-control .vjs-icon-placeholder:before,
        .vjs-icon-fullscreen-exit:before {
            content: "\f109"
        }
        
        .vjs-icon-square {
            font-family: VideoJS;
            font-weight: 400;
            font-style: normal
        }
        
        .vjs-icon-square:before {
            content: "\f10a"
        }
        
        .vjs-icon-spinner {
            font-family: VideoJS;
            font-weight: 400;
            font-style: normal
        }
        
        .vjs-icon-spinner:before {
            content: "\f10b"
        }
        
        .vdo-js .vjs-subs-caps-button .vjs-icon-placeholder,
        .vdo-js .vjs-subtitles-button .vjs-icon-placeholder,
        .vdo-js.vdo-js:lang(en-AU) .vjs-subs-caps-button .vjs-icon-placeholder,
        .vdo-js.vdo-js:lang(en-GB) .vjs-subs-caps-button .vjs-icon-placeholder,
        .vdo-js.vdo-js:lang(en-IE) .vjs-subs-caps-button .vjs-icon-placeholder,
        .vdo-js.vdo-js:lang(en-NZ) .vjs-subs-caps-button .vjs-icon-placeholder,
        .vjs-icon-subtitles {
            font-family: VideoJS;
            font-weight: 400;
            font-style: normal
        }
        
        .vdo-js .vjs-subs-caps-button .vjs-icon-placeholder:before,
        .vdo-js .vjs-subtitles-button .vjs-icon-placeholder:before,
        .vdo-js.vdo-js:lang(en-AU) .vjs-subs-caps-button .vjs-icon-placeholder:before,
        .vdo-js.vdo-js:lang(en-GB) .vjs-subs-caps-button .vjs-icon-placeholder:before,
        .vdo-js.vdo-js:lang(en-IE) .vjs-subs-caps-button .vjs-icon-placeholder:before,
        .vdo-js.vdo-js:lang(en-NZ) .vjs-subs-caps-button .vjs-icon-placeholder:before,
        .vjs-icon-subtitles:before {
            content: "\f10c"
        }
        
        .vdo-js .vjs-captions-button .vjs-icon-placeholder,
        .vdo-js:lang(en) .vjs-subs-caps-button .vjs-icon-placeholder,
        .vdo-js:lang(fr-CA) .vjs-subs-caps-button .vjs-icon-placeholder,
        .vjs-icon-captions {
            font-family: VideoJS;
            font-weight: 400;
            font-style: normal
        }
        
        .vdo-js .vjs-captions-button .vjs-icon-placeholder:before,
        .vdo-js:lang(en) .vjs-subs-caps-button .vjs-icon-placeholder:before,
        .vdo-js:lang(fr-CA) .vjs-subs-caps-button .vjs-icon-placeholder:before,
        .vjs-icon-captions:before {
            content: "\f10d"
        }
        
        .vdo-js .vjs-chapters-button .vjs-icon-placeholder,
        .vjs-icon-chapters {
            font-family: VideoJS;
            font-weight: 400;
            font-style: normal
        }
        
        .vdo-js .vjs-chapters-button .vjs-icon-placeholder:before,
        .vjs-icon-chapters:before {
            content: "\f10e"
        }
        
        .vjs-icon-share {
            font-family: VideoJS;
            font-weight: 400;
            font-style: normal
        }
        
        .vjs-icon-share:before {
            content: "\f10f"
        }
        
        .vjs-icon-cog {
            font-family: VideoJS;
            font-weight: 400;
            font-style: normal
        }
        
        .vjs-icon-cog:before {
            content: "\f110"
        }
        
        .vdo-js .vjs-play-progress,
        .vdo-js .vjs-volume-level,
        .vjs-icon-circle {
            font-family: VideoJS;
            font-weight: 400;
            font-style: normal
        }
        
        .vdo-js .vjs-play-progress:before,
        .vdo-js .vjs-volume-level:before,
        .vjs-icon-circle:before {
            content: "\f111"
        }
        
        .vjs-icon-circle-outline {
            font-family: VideoJS;
            font-weight: 400;
            font-style: normal
        }
        
        .vjs-icon-circle-outline:before {
            content: "\f112"
        }
        
        .vjs-icon-circle-inner-circle {
            font-family: VideoJS;
            font-weight: 400;
            font-style: normal
        }
        
        .vjs-icon-circle-inner-circle:before {
            content: "\f113"
        }
        
        .vjs-icon-hd {
            font-family: VideoJS;
            font-weight: 400;
            font-style: normal
        }
        
        .vjs-icon-hd:before {
            content: "\f114"
        }
        
        .vdo-js .vjs-control.vjs-close-button .vjs-icon-placeholder,
        .vjs-icon-cancel {
            font-family: VideoJS;
            font-weight: 400;
            font-style: normal
        }
        
        .vdo-js .vjs-control.vjs-close-button .vjs-icon-placeholder:before,
        .vjs-icon-cancel:before {
            content: "\f115"
        }
        
        .vdo-js .vjs-play-control.vjs-ended .vjs-icon-placeholder,
        .vjs-icon-replay {
            font-family: VideoJS;
            font-weight: 400;
            font-style: normal
        }
        
        .vdo-js .vjs-play-control.vjs-ended .vjs-icon-placeholder:before,
        .vjs-icon-replay:before {
            content: "\f116"
        }
        
        .vjs-icon-facebook {
            font-family: VideoJS;
            font-weight: 400;
            font-style: normal
        }
        
        .vjs-icon-facebook:before {
            content: "\f117"
        }
        
        .vjs-icon-gplus {
            font-family: VideoJS;
            font-weight: 400;
            font-style: normal
        }
        
        .vjs-icon-gplus:before {
            content: "\f118"
        }
        
        .vjs-icon-linkedin {
            font-family: VideoJS;
            font-weight: 400;
            font-style: normal
        }
        
        .vjs-icon-linkedin:before {
            content: "\f119"
        }
        
        .vjs-icon-twitter {
            font-family: VideoJS;
            font-weight: 400;
            font-style: normal
        }
        
        .vjs-icon-twitter:before {
            content: "\f11a"
        }
        
        .vjs-icon-tumblr {
            font-family: VideoJS;
            font-weight: 400;
            font-style: normal
        }
        
        .vjs-icon-tumblr:before {
            content: "\f11b"
        }
        
        .vjs-icon-pinterest {
            font-family: VideoJS;
            font-weight: 400;
            font-style: normal
        }
        
        .vjs-icon-pinterest:before {
            content: "\f11c"
        }
        
        .vdo-js .vjs-descriptions-button .vjs-icon-placeholder,
        .vjs-icon-audio-description {
            font-family: VideoJS;
            font-weight: 400;
            font-style: normal
        }
        
        .vdo-js .vjs-descriptions-button .vjs-icon-placeholder:before,
        .vjs-icon-audio-description:before {
            content: "\f11d"
        }
        
        .vdo-js .vjs-audio-button .vjs-icon-placeholder,
        .vjs-icon-audio {
            font-family: VideoJS;
            font-weight: 400;
            font-style: normal
        }
        
        .vdo-js .vjs-audio-button .vjs-icon-placeholder:before,
        .vjs-icon-audio:before {
            content: "\f11e"
        }
        
        .vjs-icon-next-item {
            font-family: VideoJS;
            font-weight: 400;
            font-style: normal
        }
        
        .vjs-icon-next-item:before {
            content: "\f11f"
        }
        
        .vjs-icon-previous-item {
            font-family: VideoJS;
            font-weight: 400;
            font-style: normal
        }
        
        .vjs-icon-previous-item:before {
            content: "\f120"
        }
        
        .vdo-js {
            display: block;
            vertical-align: top;
            box-sizing: border-box;
            color: #fff;
            background-color: #000;
            position: relative;
            padding: 0;
            font-size: 10px;
            line-height: 1;
            font-weight: 400;
            font-style: normal;
            font-family: Arial, Helvetica, sans-serif;
            word-break: initial
        }
        
        .vdo-js:-moz-full-screen {
            position: absolute
        }
        
        .vdo-js:-webkit-full-screen {
            width: 100%!important;
            height: 100%!important
        }
        
        .vdo-js[tabindex="-1"] {
            outline: 0
        }
        
        .vdo-js *,
        .vdo-js :after,
        .vdo-js :before {
            box-sizing: inherit
        }
        
        .vdo-js ul {
            font-family: inherit;
            font-size: inherit;
            line-height: inherit;
            list-style-position: outside;
            margin-left: 0;
            margin-right: 0;
            margin-top: 0;
            margin-bottom: 0
        }
        
        .vdo-js.vjs-16-9,
        .vdo-js.vjs-4-3,
        .vdo-js.vjs-fluid {
            width: 100%;
            max-width: 100%;
            height: 0
        }
        
        .vdo-js.vjs-16-9 {
            padding-top: 56.25%
        }
        
        .vdo-js.vjs-4-3 {
            padding-top: 75%
        }
        
        .vdo-js.vjs-fill {
            width: 100%;
            height: 100%
        }
        
        .vdo-js .vjs-tech {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%
        }
        
        body.vjs-full-window {
            padding: 0;
            margin: 0;
            height: 100%;
            overflow-y: auto
        }
        
        .vjs-full-window .vdo-js.vjs-fullscreen {
            position: fixed;
            overflow: hidden;
            z-index: 1000;
            left: 0;
            top: 0;
            bottom: 0;
            right: 0
        }
        
        .vdo-js.vjs-fullscreen {
            width: 100%!important;
            height: 100%!important;
            padding-top: 0!important
        }
        
        .vdo-js.vjs-fullscreen.vjs-user-inactive {
            cursor: none
        }
        
        .vjs-hidden {
            display: none!important
        }
        
        .vjs-disabled {
            opacity: .5;
            cursor: default
        }
        
        .vdo-js .vjs-offscreen {
            height: 1px;
            left: -9999px;
            position: absolute;
            top: 0;
            width: 1px
        }
        
        .vjs-lock-showing {
            display: block!important;
            opacity: 1;
            visibility: visible
        }
        
        .vjs-no-js {
            padding: 20px;
            color: #fff;
            background-color: #000;
            font-size: 18px;
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;
            width: 300px;
            height: 150px;
            margin: 0 auto
        }
        
        .vjs-no-js a,
        .vjs-no-js a:visited {
            color: #66a8cc
        }
        
        .vdo-js .vjs-big-play-button {
            font-size: 3em;
            line-height: 1.5em;
            height: 1.5em;
            width: 3em;
            display: block;
            position: absolute;
            top: 10px;
            left: 10px;
            padding: 0;
            cursor: pointer;
            opacity: 1;
            border: .06666em solid #fff;
            background-color: #2b333f;
            background-color: rgba(43, 51, 63, .7);
            -webkit-border-radius: .3em;
            -moz-border-radius: .3em;
            border-radius: .3em;
            -webkit-transition: all .4s;
            -moz-transition: all .4s;
            -ms-transition: all .4s;
            -o-transition: all .4s;
            transition: all .4s
        }
        
        .vjs-big-play-centered .vjs-big-play-button {
            top: 50%;
            left: 50%;
            margin-top: -.75em;
            margin-left: -1.5em
        }
        
        .vdo-js .vjs-big-play-button:focus,
        .vdo-js:hover .vjs-big-play-button {
            border-color: #fff;
            background-color: #73859f;
            background-color: rgba(115, 133, 159, .5);
            -webkit-transition: all 0s;
            -moz-transition: all 0s;
            -ms-transition: all 0s;
            -o-transition: all 0s;
            transition: all 0s
        }
        
        .vjs-controls-disabled .vjs-big-play-button,
        .vjs-error .vjs-big-play-button,
        .vjs-has-started .vjs-big-play-button,
        .vjs-using-native-controls .vjs-big-play-button {
            display: none
        }
        
        .vjs-has-started.vjs-paused.vjs-show-big-play-button-on-pause .vjs-big-play-button {
            display: block
        }
        
        .vdo-js button {
            background: 0 0;
            border: none;
            color: inherit;
            display: inline-block;
            overflow: visible;
            font-size: inherit;
            line-height: inherit;
            text-transform: none;
            text-decoration: none;
            transition: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none
        }
        
        .vjs-control .vjs-button {
            width: 100%;
            height: 100%
        }
        
        .vdo-js .vjs-control.vjs-close-button {
            cursor: pointer;
            height: 3em;
            position: absolute;
            right: 0;
            top: .5em;
            z-index: 2
        }
        
        .vdo-js .vjs-modal-dialog {
            background: rgba(0, 0, 0, .8);
            background: -webkit-linear-gradient(-90deg, rgba(0, 0, 0, .8), rgba(255, 255, 255, 0));
            background: linear-gradient(180deg, rgba(0, 0, 0, .8), rgba(255, 255, 255, 0));
            overflow: auto;
            box-sizing: content-box
        }
        
        .vdo-js .vjs-modal-dialog>* {
            box-sizing: border-box
        }
        
        .vjs-modal-dialog .vjs-modal-dialog-content {
            font-size: 1.2em;
            line-height: 1.5;
            padding: 20px 24px;
            z-index: 1
        }
        
        .vjs-menu-button {
            cursor: pointer
        }
        
        .vjs-menu-button.vjs-disabled {
            cursor: default
        }
        
        .vjs-workinghover .vjs-menu-button.vjs-disabled:hover .vjs-menu {
            display: none
        }
        
        .vjs-menu .vjs-menu-content {
            display: block;
            padding: 0;
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            overflow: auto;
            box-sizing: content-box
        }
        
        .vjs-menu .vjs-menu-content>* {
            box-sizing: border-box
        }
        
        .vjs-scrubbing .vjs-menu-button:hover .vjs-menu {
            display: none
        }
        
        .vjs-menu li {
            list-style: none;
            margin: 0;
            padding: .2em 0;
            line-height: 1.4em;
            font-size: 1.2em;
            text-align: center;
            text-transform: lowercase
        }
        
        .vjs-menu li.vjs-menu-item:focus,
        .vjs-menu li.vjs-menu-item:hover {
            background-color: #73859f;
            background-color: rgba(115, 133, 159, .5)
        }
        
        .vjs-menu li.vjs-selected,
        .vjs-menu li.vjs-selected:focus,
        .vjs-menu li.vjs-selected:hover {
            background-color: #fff;
            color: #2b333f
        }
        
        .vjs-menu li.vjs-menu-title {
            text-align: center;
            text-transform: uppercase;
            font-size: 1em;
            line-height: 2em;
            padding: 0;
            margin: 0 0 .3em 0;
            font-weight: 700;
            cursor: default
        }
        
        .vjs-menu-button-popup .vjs-menu {
            display: none;
            position: absolute;
            bottom: 0;
            width: 10em;
            left: -3em;
            height: 0;
            margin-bottom: 1.5em;
            border-top-color: rgba(43, 51, 63, .7)
        }
        
        .vjs-menu-button-popup .vjs-menu .vjs-menu-content {
            background-color: #2b333f;
            background-color: rgba(43, 51, 63, .7);
            position: absolute;
            width: 100%;
            bottom: 1.5em;
            max-height: 15em
        }
        
        .vjs-menu-button-popup .vjs-menu.vjs-lock-showing,
        .vjs-workinghover .vjs-menu-button-popup:hover .vjs-menu {
            display: block
        }
        
        .vdo-js .vjs-menu-button-inline {
            -webkit-transition: all .4s;
            -moz-transition: all .4s;
            -ms-transition: all .4s;
            -o-transition: all .4s;
            transition: all .4s;
            overflow: hidden
        }
        
        .vdo-js .vjs-menu-button-inline:before {
            width: 2.222222222em
        }
        
        .vdo-js .vjs-menu-button-inline.vjs-slider-active,
        .vdo-js .vjs-menu-button-inline:focus,
        .vdo-js .vjs-menu-button-inline:hover,
        .vdo-js.vjs-no-flex .vjs-menu-button-inline {
            width: 12em
        }
        
        .vjs-menu-button-inline .vjs-menu {
            opacity: 0;
            height: 100%;
            width: auto;
            position: absolute;
            left: 4em;
            top: 0;
            padding: 0;
            margin: 0;
            -webkit-transition: all .4s;
            -moz-transition: all .4s;
            -ms-transition: all .4s;
            -o-transition: all .4s;
            transition: all .4s
        }
        
        .vjs-menu-button-inline.vjs-slider-active .vjs-menu,
        .vjs-menu-button-inline:focus .vjs-menu,
        .vjs-menu-button-inline:hover .vjs-menu {
            display: block;
            opacity: 1
        }
        
        .vjs-no-flex .vjs-menu-button-inline .vjs-menu {
            display: block;
            opacity: 1;
            position: relative;
            width: auto
        }
        
        .vjs-no-flex .vjs-menu-button-inline.vjs-slider-active .vjs-menu,
        .vjs-no-flex .vjs-menu-button-inline:focus .vjs-menu,
        .vjs-no-flex .vjs-menu-button-inline:hover .vjs-menu {
            width: auto
        }
        
        .vjs-menu-button-inline .vjs-menu-content {
            width: auto;
            height: 100%;
            margin: 0;
            overflow: hidden
        }
        
        .vdo-js .vjs-control-bar {
            display: none;
            width: 100%;
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 3em;
            background-color: #2b333f;
            background-color: rgba(43, 51, 63, .7)
        }
        
        .vjs-has-started .vjs-control-bar {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            visibility: visible;
            opacity: 1;
            -webkit-transition: visibility .1s, opacity .1s;
            -moz-transition: visibility .1s, opacity .1s;
            -ms-transition: visibility .1s, opacity .1s;
            -o-transition: visibility .1s, opacity .1s;
            transition: visibility .1s, opacity .1s
        }
        
        .vjs-has-started.vjs-user-inactive.vjs-playing .vjs-control-bar {
            visibility: visible;
            opacity: 0;
            -webkit-transition: visibility 1s, opacity 1s;
            -moz-transition: visibility 1s, opacity 1s;
            -ms-transition: visibility 1s, opacity 1s;
            -o-transition: visibility 1s, opacity 1s;
            transition: visibility 1s, opacity 1s
        }
        
        .vjs-controls-disabled .vjs-control-bar,
        .vjs-error .vjs-control-bar,
        .vjs-using-native-controls .vjs-control-bar {
            display: none!important
        }
        
        .vjs-audio.vjs-has-started.vjs-user-inactive.vjs-playing .vjs-control-bar {
            opacity: 1;
            visibility: visible
        }
        
        .vjs-has-started.vjs-no-flex .vjs-control-bar {
            display: table
        }
        
        .vdo-js .vjs-control {
            position: relative;
            text-align: center;
            margin: 0;
            padding: 0;
            height: 100%;
            width: 4em;
            -webkit-box-flex: none;
            -moz-box-flex: none;
            -webkit-flex: none;
            -ms-flex: none;
            flex: none
        }
        
        .vjs-button>.vjs-icon-placeholder:before {
            font-size: 1.8em;
            line-height: 1.67
        }
        
        .vdo-js .vjs-control:focus,
        .vdo-js .vjs-control:focus:before,
        .vdo-js .vjs-control:hover:before {
            text-shadow: 0 0 1em #fff
        }
        
        .vdo-js .vjs-control-text {
            border: 0;
            clip: rect(0 0 0 0);
            height: 1px;
            overflow: hidden;
            padding: 0;
            position: absolute;
            width: 1px
        }
        
        .vjs-no-flex .vjs-control {
            display: table-cell;
            vertical-align: middle
        }
        
        .vdo-js .vjs-custom-control-spacer {
            display: none
        }
        
        .vdo-js .vjs-progress-control {
            cursor: pointer;
            -webkit-box-flex: auto;
            -moz-box-flex: auto;
            -webkit-flex: auto;
            -ms-flex: auto;
            flex: auto;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -webkit-align-items: center;
            -ms-flex-align: center;
            align-items: center;
            min-width: 4em
        }
        
        .vdo-js .vjs-progress-control.disabled {
            cursor: default
        }
        
        .vjs-live .vjs-progress-control {
            display: none
        }
        
        .vjs-no-flex .vjs-progress-control {
            width: auto
        }
        
        .vdo-js .vjs-progress-holder {
            -webkit-box-flex: auto;
            -moz-box-flex: auto;
            -webkit-flex: auto;
            -ms-flex: auto;
            flex: auto;
            -webkit-transition: all .2s;
            -moz-transition: all .2s;
            -ms-transition: all .2s;
            -o-transition: all .2s;
            transition: all .2s;
            height: .3em
        }
        
        .vdo-js .vjs-progress-control .vjs-progress-holder {
            margin: 0 10px
        }
        
        .vdo-js .vjs-progress-control:hover .vjs-progress-holder {
            font-size: 1.666666666666666666em
        }
        
        .vdo-js .vjs-progress-control:hover .vjs-progress-holder.disabled {
            font-size: 1em
        }
        
        .vdo-js .vjs-progress-holder .vjs-load-progress,
        .vdo-js .vjs-progress-holder .vjs-load-progress div,
        .vdo-js .vjs-progress-holder .vjs-play-progress {
            position: absolute;
            display: block;
            height: 100%;
            margin: 0;
            padding: 0;
            width: 0;
            left: 0;
            top: 0
        }
        
        .vdo-js .vjs-play-progress {
            background-color: #fff
        }
        
        .vdo-js .vjs-play-progress:before {
            font-size: .9em;
            position: absolute;
            right: -.5em;
            top: -.333333333333333em;
            z-index: 1
        }
        
        .vdo-js .vjs-load-progress {
            background: #bfc7d3;
            background: rgba(115, 133, 159, .5)
        }
        
        .vdo-js .vjs-load-progress div {
            background: #fff;
            background: rgba(115, 133, 159, .75)
        }
        
        .vdo-js .vjs-time-tooltip {
            background-color: #fff;
            background-color: rgba(255, 255, 255, .8);
            -webkit-border-radius: .3em;
            -moz-border-radius: .3em;
            border-radius: .3em;
            color: #000;
            float: right;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 1em;
            padding: 6px 8px 8px 8px;
            pointer-events: none;
            position: relative;
            top: -3.4em;
            visibility: hidden;
            z-index: 1
        }
        
        .vdo-js .vjs-progress-holder:focus .vjs-time-tooltip {
            display: none
        }
        
        .vdo-js .vjs-progress-control:hover .vjs-progress-holder:focus .vjs-time-tooltip,
        .vdo-js .vjs-progress-control:hover .vjs-time-tooltip {
            display: block;
            font-size: .6em;
            visibility: visible
        }
        
        .vdo-js .vjs-progress-control.disabled:hover .vjs-time-tooltip {
            font-size: 1em
        }
        
        .vdo-js .vjs-progress-control .vjs-mouse-display {
            display: none;
            position: absolute;
            width: 1px;
            height: 100%;
            background-color: #000;
            z-index: 1
        }
        
        .vjs-no-flex .vjs-progress-control .vjs-mouse-display {
            z-index: 0
        }
        
        .vdo-js .vjs-progress-control:hover .vjs-mouse-display {
            display: block
        }
        
        .vdo-js.vjs-user-inactive .vjs-progress-control .vjs-mouse-display {
            visibility: hidden;
            opacity: 0;
            -webkit-transition: visibility 1s, opacity 1s;
            -moz-transition: visibility 1s, opacity 1s;
            -ms-transition: visibility 1s, opacity 1s;
            -o-transition: visibility 1s, opacity 1s;
            transition: visibility 1s, opacity 1s
        }
        
        .vdo-js.vjs-user-inactive.vjs-no-flex .vjs-progress-control .vjs-mouse-display {
            display: none
        }
        
        .vjs-mouse-display .vjs-time-tooltip {
            color: #fff;
            background-color: #000;
            background-color: rgba(0, 0, 0, .8)
        }
        
        .vdo-js .vjs-slider {
            position: relative;
            cursor: pointer;
            padding: 0;
            margin: 0 .45em 0 .45em;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-color: #73859f;
            background-color: rgba(115, 133, 159, .5)
        }
        
        .vdo-js .vjs-slider.disabled {
            cursor: default
        }
        
        .vdo-js .vjs-slider:focus {
            text-shadow: 0 0 1em #fff;
            -webkit-box-shadow: 0 0 1em #fff;
            -moz-box-shadow: 0 0 1em #fff;
            box-shadow: 0 0 1em #fff
        }
        
        .vdo-js .vjs-mute-control {
            cursor: pointer;
            -webkit-box-flex: none;
            -moz-box-flex: none;
            -webkit-flex: none;
            -ms-flex: none;
            flex: none;
            padding-left: 2em;
            padding-right: 2em;
            padding-bottom: 3em
        }
        
        .vdo-js .vjs-volume-control {
            cursor: pointer;
            margin-right: 1em;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex
        }
        
        .vdo-js .vjs-volume-control.vjs-volume-horizontal {
            width: 5em
        }
        
        .vdo-js .vjs-volume-panel .vjs-volume-control {
            visibility: visible;
            opacity: 0;
            width: 1px;
            height: 1px;
            margin-left: -1px
        }
        
        .vdo-js .vjs-volume-panel {
            -webkit-transition: width 1s;
            -moz-transition: width 1s;
            -ms-transition: width 1s;
            -o-transition: width 1s;
            transition: width 1s
        }
        
        .vdo-js .vjs-volume-panel .vjs-mute-control:hover~.vjs-volume-control,
        .vdo-js .vjs-volume-panel .vjs-volume-control.vjs-slider-active,
        .vdo-js .vjs-volume-panel .vjs-volume-control:active,
        .vdo-js .vjs-volume-panel .vjs-volume-control:hover,
        .vdo-js .vjs-volume-panel:active .vjs-volume-control,
        .vdo-js .vjs-volume-panel:focus .vjs-volume-control,
        .vdo-js .vjs-volume-panel:hover .vjs-volume-control {
            visibility: visible;
            opacity: 1;
            position: relative;
            -webkit-transition: visibility .1s, opacity .1s, height .1s, width .1s, left 0s, top 0s;
            -moz-transition: visibility .1s, opacity .1s, height .1s, width .1s, left 0s, top 0s;
            -ms-transition: visibility .1s, opacity .1s, height .1s, width .1s, left 0s, top 0s;
            -o-transition: visibility .1s, opacity .1s, height .1s, width .1s, left 0s, top 0s;
            transition: visibility .1s, opacity .1s, height .1s, width .1s, left 0s, top 0s
        }
        
        .vdo-js .vjs-volume-panel .vjs-mute-control:hover~.vjs-volume-control.vjs-volume-horizontal,
        .vdo-js .vjs-volume-panel .vjs-volume-control.vjs-slider-active.vjs-volume-horizontal,
        .vdo-js .vjs-volume-panel .vjs-volume-control:active.vjs-volume-horizontal,
        .vdo-js .vjs-volume-panel .vjs-volume-control:hover.vjs-volume-horizontal,
        .vdo-js .vjs-volume-panel:active .vjs-volume-control.vjs-volume-horizontal,
        .vdo-js .vjs-volume-panel:focus .vjs-volume-control.vjs-volume-horizontal,
        .vdo-js .vjs-volume-panel:hover .vjs-volume-control.vjs-volume-horizontal {
            width: 5em;
            height: 3em
        }
        
        .vdo-js .vjs-volume-panel.vjs-volume-panel-horizontal.vjs-slider-active,
        .vdo-js .vjs-volume-panel.vjs-volume-panel-horizontal:active,
        .vdo-js .vjs-volume-panel.vjs-volume-panel-horizontal:hover {
            width: 9em;
            -webkit-transition: width .1s;
            -moz-transition: width .1s;
            -ms-transition: width .1s;
            -o-transition: width .1s;
            transition: width .1s
        }
        
        .vdo-js .vjs-volume-panel .vjs-volume-control.vjs-volume-vertical {
            height: 8em;
            width: 3em;
            left: -3.5em;
            -webkit-transition: visibility 1s, opacity 1s, height 1s 1s, width 1s 1s, left 1s 1s, top 1s 1s;
            -moz-transition: visibility 1s, opacity 1s, height 1s 1s, width 1s 1s, left 1s 1s, top 1s 1s;
            -ms-transition: visibility 1s, opacity 1s, height 1s 1s, width 1s 1s, left 1s 1s, top 1s 1s;
            -o-transition: visibility 1s, opacity 1s, height 1s 1s, width 1s 1s, left 1s 1s, top 1s 1s;
            transition: visibility 1s, opacity 1s, height 1s 1s, width 1s 1s, left 1s 1s, top 1s 1s
        }
        
        .vdo-js .vjs-volume-panel .vjs-volume-control.vjs-volume-horizontal {
            -webkit-transition: visibility 1s, opacity 1s, height 1s 1s, width 1s, left 1s 1s, top 1s 1s;
            -moz-transition: visibility 1s, opacity 1s, height 1s 1s, width 1s, left 1s 1s, top 1s 1s;
            -ms-transition: visibility 1s, opacity 1s, height 1s 1s, width 1s, left 1s 1s, top 1s 1s;
            -o-transition: visibility 1s, opacity 1s, height 1s 1s, width 1s, left 1s 1s, top 1s 1s;
            transition: visibility 1s, opacity 1s, height 1s 1s, width 1s, left 1s 1s, top 1s 1s
        }
        
        .vdo-js.vjs-no-flex .vjs-volume-panel .vjs-volume-control.vjs-volume-horizontal {
            width: 5em;
            height: 3em;
            visibility: visible;
            opacity: 1;
            position: relative;
            -webkit-transition: none;
            -moz-transition: none;
            -ms-transition: none;
            -o-transition: none;
            transition: none
        }
        
        .vdo-js.vjs-no-flex .vjs-volume-control.vjs-volume-vertical,
        .vdo-js.vjs-no-flex .vjs-volume-panel .vjs-volume-control.vjs-volume-vertical {
            position: absolute;
            bottom: 3em;
            left: .5em
        }
        
        .vdo-js .vjs-volume-panel {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex
        }
        
        .vdo-js .vjs-volume-bar {
            margin: 1.35em .45em
        }
        
        .vjs-volume-bar.vjs-slider-horizontal {
            width: 5em;
            height: .3em
        }
        
        .vjs-volume-bar.vjs-slider-vertical {
            width: .3em;
            height: 5em;
            margin: 1.35em auto
        }
        
        .vdo-js .vjs-volume-level {
            position: absolute;
            bottom: 0;
            left: 0;
            background-color: #fff
        }
        
        .vdo-js .vjs-volume-level:before {
            position: absolute;
            font-size: .9em
        }
        
        .vjs-slider-vertical .vjs-volume-level {
            width: .3em
        }
        
        .vjs-slider-vertical .vjs-volume-level:before {
            top: -.5em;
            left: -.3em
        }
        
        .vjs-slider-horizontal .vjs-volume-level {
            height: .3em
        }
        
        .vjs-slider-horizontal .vjs-volume-level:before {
            top: -.3em;
            right: -.5em
        }
        
        .vdo-js .vjs-volume-panel.vjs-volume-panel-vertical {
            width: 4em
        }
        
        .vjs-volume-bar.vjs-slider-vertical .vjs-volume-level {
            height: 100%
        }
        
        .vjs-volume-bar.vjs-slider-horizontal .vjs-volume-level {
            width: 100%
        }
        
        .vdo-js .vjs-volume-vertical {
            width: 3em;
            height: 8em;
            bottom: 8em;
            background-color: #2b333f;
            background-color: rgba(43, 51, 63, .7)
        }
        
        .vdo-js .vjs-volume-horizontal .vjs-menu {
            left: -2em
        }
        
        .vjs-poster {
            display: inline-block;
            vertical-align: middle;
            background-repeat: no-repeat;
            background-position: 50% 50%;
            background-size: contain;
            background-color: #000;
            cursor: pointer;
            margin: 0;
            padding: 0;
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            height: 100%
        }
        
        .vjs-poster img {
            display: block;
            vertical-align: middle;
            margin: 0 auto;
            max-height: 100%;
            padding: 0;
            width: 100%
        }
        
        .vjs-has-started .vjs-poster {
            display: none
        }
        
        .vjs-audio.vjs-has-started .vjs-poster {
            display: block
        }
        
        .vjs-using-native-controls .vjs-poster {
            display: none
        }
        
        .vdo-js .vjs-live-control {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: flex-start;
            -webkit-align-items: flex-start;
            -ms-flex-align: flex-start;
            align-items: flex-start;
            -webkit-box-flex: auto;
            -moz-box-flex: auto;
            -webkit-flex: auto;
            -ms-flex: auto;
            flex: auto;
            font-size: 1em;
            line-height: 3em
        }
        
        .vjs-no-flex .vjs-live-control {
            display: table-cell;
            width: auto;
            text-align: left
        }
        
        .vdo-js .vjs-time-control {
            -webkit-box-flex: none;
            -moz-box-flex: none;
            -webkit-flex: none;
            -ms-flex: none;
            flex: none;
            font-size: 1em;
            line-height: 3em;
            min-width: 2em;
            width: auto;
            padding-left: 1em;
            padding-right: 1em
        }
        
        .vjs-live .vjs-time-control {
            display: none
        }
        
        .vdo-js .vjs-current-time,
        .vjs-no-flex .vjs-current-time {
            display: none
        }
        
        .vjs-no-flex .vjs-remaining-time.vjs-time-control.vjs-control {
            width: 0!important;
            white-space: nowrap
        }
        
        .vdo-js .vjs-duration,
        .vjs-no-flex .vjs-duration {
            display: none
        }
        
        .vjs-time-divider {
            display: none;
            line-height: 3em
        }
        
        .vjs-live .vjs-time-divider {
            display: none
        }
        
        .vdo-js .vjs-play-control .vjs-icon-placeholder {
            cursor: pointer;
            -webkit-box-flex: none;
            -moz-box-flex: none;
            -webkit-flex: none;
            -ms-flex: none;
            flex: none
        }
        
        .vjs-text-track-display {
            position: absolute;
            bottom: 3em;
            left: 0;
            right: 0;
            top: 0;
            pointer-events: none
        }
        
        .vdo-js.vjs-user-inactive.vjs-playing .vjs-text-track-display {
            bottom: 1em
        }
        
        .vdo-js .vjs-text-track {
            font-size: 1.4em;
            text-align: center;
            margin-bottom: .1em;
            background-color: #000;
            background-color: rgba(0, 0, 0, .5)
        }
        
        .vjs-subtitles {
            color: #fff
        }
        
        .vjs-captions {
            color: #fc6
        }
        
        .vjs-tt-cue {
            display: block
        }
        
        video::-webkit-media-text-track-display {
            -moz-transform: translateY(-3em);
            -ms-transform: translateY(-3em);
            -o-transform: translateY(-3em);
            -webkit-transform: translateY(-3em);
            transform: translateY(-3em)
        }
        
        .vdo-js.vjs-user-inactive.vjs-playing video::-webkit-media-text-track-display {
            -moz-transform: translateY(-1.5em);
            -ms-transform: translateY(-1.5em);
            -o-transform: translateY(-1.5em);
            -webkit-transform: translateY(-1.5em);
            transform: translateY(-1.5em)
        }
        
        .vdo-js .vjs-fullscreen-control {
            cursor: pointer;
            -webkit-box-flex: none;
            -moz-box-flex: none;
            -webkit-flex: none;
            -ms-flex: none;
            flex: none
        }
        
        .vjs-playback-rate .vjs-playback-rate-value,
        .vjs-playback-rate>.vjs-menu-button {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%
        }
        
        .vjs-playback-rate .vjs-playback-rate-value {
            pointer-events: none;
            font-size: 1.5em;
            line-height: 2;
            text-align: center
        }
        
        .vjs-playback-rate .vjs-menu {
            width: 4em;
            left: 0
        }
        
        .vjs-error .vjs-error-display .vjs-modal-dialog-content {
            font-size: 1.4em;
            text-align: center
        }
        
        .vjs-error .vjs-error-display:before {
            color: #fff;
            content: 'X';
            font-family: Arial, Helvetica, sans-serif;
            font-size: 4em;
            left: 0;
            line-height: 1;
            margin-top: -.5em;
            position: absolute;
            text-shadow: .05em .05em .1em #000;
            text-align: center;
            top: 50%;
            vertical-align: middle;
            width: 100%
        }
        
        .vjs-loading-spinner {
            display: none;
            position: absolute;
            top: 50%;
            left: 50%;
            margin: -25px 0 0 -25px;
            opacity: .85;
            text-align: left;
            border: 6px solid rgba(43, 51, 63, .7);
            box-sizing: border-box;
            background-clip: padding-box;
            width: 50px;
            height: 50px;
            border-radius: 25px;
            visibility: hidden
        }
        
        .vjs-seeking .vjs-loading-spinner,
        .vjs-waiting .vjs-loading-spinner {
            display: block;
            animation: 0s linear .3s forwards vjs-spinner-show
        }
        
        .vjs-loading-spinner:after,
        .vjs-loading-spinner:before {
            content: "";
            position: absolute;
            margin: -6px;
            box-sizing: inherit;
            width: inherit;
            height: inherit;
            border-radius: inherit;
            opacity: 1;
            border: inherit;
            border-color: transparent;
            border-top-color: #fff
        }
        
        .vjs-seeking .vjs-loading-spinner:after,
        .vjs-seeking .vjs-loading-spinner:before,
        .vjs-waiting .vjs-loading-spinner:after,
        .vjs-waiting .vjs-loading-spinner:before {
            -webkit-animation: vjs-spinner-spin 1.1s cubic-bezier(.6, .2, 0, .8) infinite, vjs-spinner-fade 1.1s linear infinite;
            animation: vjs-spinner-spin 1.1s cubic-bezier(.6, .2, 0, .8) infinite, vjs-spinner-fade 1.1s linear infinite
        }
        
        .vjs-seeking .vjs-loading-spinner:before,
        .vjs-waiting .vjs-loading-spinner:before {
            border-top-color: #fff
        }
        
        .vjs-seeking .vjs-loading-spinner:after,
        .vjs-waiting .vjs-loading-spinner:after {
            border-top-color: #fff;
            -webkit-animation-delay: .44s;
            animation-delay: .44s
        }
        
        @keyframes vjs-spinner-show {
            to {
                visibility: visible
            }
        }
        
        @-webkit-keyframes vjs-spinner-show {
            to {
                visibility: visible
            }
        }
        
        @keyframes vjs-spinner-spin {
            100% {
                transform: rotate(360deg)
            }
        }
        
        @-webkit-keyframes vjs-spinner-spin {
            100% {
                -webkit-transform: rotate(360deg)
            }
        }
        
        @keyframes vjs-spinner-fade {
            0% {
                border-top-color: #73859f
            }
            20% {
                border-top-color: #73859f
            }
            35% {
                border-top-color: #fff
            }
            60% {
                border-top-color: #73859f
            }
            100% {
                border-top-color: #73859f
            }
        }
        
        @-webkit-keyframes vjs-spinner-fade {
            0% {
                border-top-color: #73859f
            }
            20% {
                border-top-color: #73859f
            }
            35% {
                border-top-color: #fff
            }
            60% {
                border-top-color: #73859f
            }
            100% {
                border-top-color: #73859f
            }
        }
        
        .vjs-chapters-button .vjs-menu ul {
            width: 24em
        }
        
        .vdo-js .vjs-subs-caps-button+.vjs-menu .vjs-captions-menu-item .vjs-menu-item-text .vjs-icon-placeholder {
            position: absolute
        }
        
        .vdo-js .vjs-subs-caps-button+.vjs-menu .vjs-captions-menu-item .vjs-menu-item-text .vjs-icon-placeholder:before {
            font-family: VideoJS;
            content: "\f10d";
            font-size: 1.5em;
            line-height: inherit
        }
        
        .vdo-js.vjs-layout-tiny:not(.vjs-fullscreen) .vjs-custom-control-spacer {
            -webkit-box-flex: auto;
            -moz-box-flex: auto;
            -webkit-flex: auto;
            -ms-flex: auto;
            flex: auto
        }
        
        .vdo-js.vjs-layout-tiny:not(.vjs-fullscreen).vjs-no-flex .vjs-custom-control-spacer {
            width: auto
        }
        
        .vdo-js.vjs-layout-tiny:not(.vjs-fullscreen) .vjs-audio-button,
        .vdo-js.vjs-layout-tiny:not(.vjs-fullscreen) .vjs-captions-button,
        .vdo-js.vjs-layout-tiny:not(.vjs-fullscreen) .vjs-chapters-button,
        .vdo-js.vjs-layout-tiny:not(.vjs-fullscreen) .vjs-current-time,
        .vdo-js.vjs-layout-tiny:not(.vjs-fullscreen) .vjs-descriptions-button,
        .vdo-js.vjs-layout-tiny:not(.vjs-fullscreen) .vjs-duration,
        .vdo-js.vjs-layout-tiny:not(.vjs-fullscreen) .vjs-mute-control,
        .vdo-js.vjs-layout-tiny:not(.vjs-fullscreen) .vjs-playback-rate,
        .vdo-js.vjs-layout-tiny:not(.vjs-fullscreen) .vjs-progress-control,
        .vdo-js.vjs-layout-tiny:not(.vjs-fullscreen) .vjs-remaining-time,
        .vdo-js.vjs-layout-tiny:not(.vjs-fullscreen) .vjs-subtitles-button,
        .vdo-js.vjs-layout-tiny:not(.vjs-fullscreen) .vjs-time-divider,
        .vdo-js.vjs-layout-tiny:not(.vjs-fullscreen) .vjs-volume-control {
            display: none
        }
        
        .vdo-js.vjs-layout-x-small:not(.vjs-fullscreen) .vjs-audio-button,
        .vdo-js.vjs-layout-x-small:not(.vjs-fullscreen) .vjs-captions-button,
        .vdo-js.vjs-layout-x-small:not(.vjs-fullscreen) .vjs-chapters-button,
        .vdo-js.vjs-layout-x-small:not(.vjs-fullscreen) .vjs-current-time,
        .vdo-js.vjs-layout-x-small:not(.vjs-fullscreen) .vjs-descriptions-button,
        .vdo-js.vjs-layout-x-small:not(.vjs-fullscreen) .vjs-duration,
        .vdo-js.vjs-layout-x-small:not(.vjs-fullscreen) .vjs-mute-control,
        .vdo-js.vjs-layout-x-small:not(.vjs-fullscreen) .vjs-playback-rate,
        .vdo-js.vjs-layout-x-small:not(.vjs-fullscreen) .vjs-remaining-time,
        .vdo-js.vjs-layout-x-small:not(.vjs-fullscreen) .vjs-subtitles-button,
        .vdo-js.vjs-layout-x-small:not(.vjs-fullscreen) .vjs-time-divider,
        .vdo-js.vjs-layout-x-small:not(.vjs-fullscreen) .vjs-volume-control {
            display: none
        }
        
        .vdo-js.vjs-layout-small:not(.vjs-fullscreen) .vjs-captions-button,
        .vdo-js.vjs-layout-small:not(.vjs-fullscreen) .vjs-chapters-button,
        .vdo-js.vjs-layout-small:not(.vjs-fullscreen) .vjs-current-time,
        .vdo-js.vjs-layout-small:not(.vjs-fullscreen) .vjs-descriptions-button,
        .vdo-js.vjs-layout-small:not(.vjs-fullscreen) .vjs-duration,
        .vdo-js.vjs-layout-small:not(.vjs-fullscreen) .vjs-mute-control,
        .vdo-js.vjs-layout-small:not(.vjs-fullscreen) .vjs-playback-rate,
        .vdo-js.vjs-layout-small:not(.vjs-fullscreen) .vjs-remaining-time,
        .vdo-js.vjs-layout-small:not(.vjs-fullscreen) .vjs-subtitles-button .vjs-audio-button,
        .vdo-js.vjs-layout-small:not(.vjs-fullscreen) .vjs-time-divider,
        .vdo-js.vjs-layout-small:not(.vjs-fullscreen) .vjs-volume-control {
            display: none
        }
        
        .vjs-modal-dialog.vjs-text-track-settings {
            background-color: #2b333f;
            background-color: rgba(43, 51, 63, .75);
            color: #fff;
            height: 70%
        }
        
        .vjs-text-track-settings .vjs-modal-dialog-content {
            display: table
        }
        
        .vjs-text-track-settings .vjs-track-settings-colors,
        .vjs-text-track-settings .vjs-track-settings-controls,
        .vjs-text-track-settings .vjs-track-settings-font {
            display: table-cell
        }
        
        .vjs-text-track-settings .vjs-track-settings-controls {
            text-align: right;
            vertical-align: bottom
        }
        
        .vjs-text-track-settings fieldset {
            margin: 5px;
            padding: 3px;
            border: none
        }
        
        .vjs-text-track-settings fieldset span {
            display: inline-block;
            margin-left: 5px
        }
        
        .vjs-text-track-settings legend {
            color: #fff;
            margin: 0 0 5px 0
        }
        
        .vjs-text-track-settings .vjs-label {
            position: absolute;
            clip: rect(1px 1px 1px 1px);
            clip: rect(1px, 1px, 1px, 1px);
            display: block;
            margin: 0 0 5px 0;
            padding: 0;
            border: 0;
            height: 1px;
            width: 1px;
            overflow: hidden
        }
        
        .vjs-track-settings-controls button:active,
        .vjs-track-settings-controls button:focus {
            outline-style: solid;
            outline-width: medium;
            background-image: linear-gradient(0deg, #fff 88%, #73859f 100%)
        }
        
        .vjs-track-settings-controls button:hover {
            color: rgba(43, 51, 63, .75)
        }
        
        .vjs-track-settings-controls button {
            background-color: #fff;
            background-image: linear-gradient(-180deg, #fff 88%, #73859f 100%);
            color: #2b333f;
            cursor: pointer;
            border-radius: 2px
        }
        
        .vjs-track-settings-controls .vjs-default-button {
            margin-right: 1em
        }
        
        @media print {
            .vdo-js>:not(.vjs-tech):not(.vjs-poster) {
                visibility: hidden
            }
        }
        
        .vjs-resize-manager {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
            visibility: hidden
        }
        
        @media \0screen {
            .vjs-user-inactive.vjs-playing .vjs-control-bar :before {
                content: ""
            }
        }
        
        @media \0screen {
            .vjs-has-started.vjs-user-inactive.vjs-playing .vjs-control-bar {
                visibility: hidden
            }
        }
    </style>
    <style>
        /*
 * videojs-contrib-ads
 * @version 6.0.0
 * @copyright 2018 Brightcove, Inc.
 * @license Apache-2.0
 */
        
        .vjs-ad-playing.vjs-ad-playing .vjs-progress-control {
            pointer-events: none
        }
        
        .vjs-ad-playing.vjs-ad-playing .vjs-play-progress {
            background-color: #ffe400
        }
        
        .vjs-ad-playing.vjs-ad-loading .vjs-loading-spinner {
            display: block
        }
        
        .vjs-ad-playing .vjs-captions-button {
            display: none
        }
        
        .vjs-ad-playing .vjs-audio-button {
            display: none
        }
        
        .vjs-ad-loading .vjs-loading-spinner:before,
        .vjs-ad-loading .vjs-loading-spinner:after {
            -webkit-animation: vjs-spinner-spin 1.1s cubic-bezier(0.6, 0.2, 0, 0.8) infinite, vjs-spinner-fade 1.1s linear infinite;
            animation: vjs-spinner-spin 1.1s cubic-bezier(0.6, 0.2, 0, 0.8) infinite, vjs-spinner-fade 1.1s linear infinite
        }
        
        .vjs-ad-loading .vjs-loading-spinner:before {
            border-top-color: #fff
        }
        
        .vjs-ad-loading .vjs-loading-spinner:after {
            border-top-color: #fff;
            -webkit-animation-delay: 0.44s;
            animation-delay: 0.44s
        }
    </style>
    <style>
        /**
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
        
        .ima-ad-container {
            top: 0em;
            position: absolute;
            display: none;
            width: 100%;
            height: 100%;
        }
        /* Move overlay if user fast-clicks play button. */
        
        .vdo-js.vjs-playing .bumpable-ima-ad-container {
            margin-top: -4em;
        }
        /* Move overlay when controls are active. */
        
        .vdo-js.vjs-user-inactive.vjs-playing .bumpable-ima-ad-container {
            margin-top: 0em;
        }
        
        .vdo-js.vjs-paused .bumpable-ima-ad-container,
        .vdo-js.vjs-playing:hover .bumpable-ima-ad-container,
        .vdo-js.vjs-user-active.vjs-playing .bumpable-ima-ad-container {
            margin-top: -4em;
        }
        
        .ima-controls-div {
            bottom: 0em;
            height: 1.4em;
            position: absolute;
            overflow: hidden;
            display: none;
            opacity: 1;
            background-color: rgba(7, 20, 30, .7);
            background: -moz-linear-gradient( bottom, rgba(7, 20, 30, .7) 0%, rgba(7, 20, 30, 0) 100%);
            /* FF3.6+ */
            background: -webkit-gradient( linear, left bottom, left top, color-stop(0%, rgba(7, 20, 30, .7)), color-stop(100%, rgba(7, 20, 30, 0)));
            /* Chrome,Safari4+ */
            background: -webkit-linear-gradient( bottom, rgba(7, 20, 30, .7) 0%, rgba(7, 20, 30, 0) 100%);
            /* Chrome10+,Safari5.1+ */
            background: -o-linear-gradient(bottom, rgba(7, 20, 30, .7) 0%, rgba(7, 20, 30, 0) 100%);
            /* Opera 11.10+ */
            background: -ms-linear-gradient(bottom, rgba(7, 20, 30, .7) 0%, rgba(7, 20, 30, 0) 100%);
            /* IE10+ */
            background: linear-gradient(to top, rgba(7, 20, 30, .7) 0%, rgba(7, 20, 30, 0) 100%);
            /* W3C */
            filter: progid: DXImageTransform.Microsoft.gradient( startColorstr='#0007141E', endColorstr='#07141E', GradientType=0);
            /* IE6-9 */
        }
        
        .ima-controls-div.ima-controls-div-showing {
            height: 3.7em;
        }
        
        .ima-countdown-div {
            height: 1em;
            color: #FFFFFF;
            text-shadow: 0 0 0.2em #000;
            cursor: default;
        }
        
        .ima-seek-bar-div {
            top: 1.2em;
            height: 0.3em;
            position: absolute;
            background: rgba(255, 255, 255, .4);
        }
        
        .ima-progress-div {
            width: 0em;
            height: 0.3em;
            background-color: #ECC546;
        }
        
        .ima-play-pause-div,
        .ima-mute-div,
        .ima-slider-div,
        .ima-fullscreen-div {
            width: 2.33em;
            height: 1.33em;
            top: 0.733em;
            left: 0em;
            position: absolute;
            color: #CCCCCC;
            font-size: 1.5em;
            line-height: 2;
            text-align: center;
            font-family: VideoJS;
            cursor: pointer;
        }
        
        .ima-mute-div {
            left: auto;
            right: 5.667em;
        }
        
        .ima-slider-div {
            left: auto;
            right: 2.33em;
            width: 3.33em;
            height: 0.667em;
            top: 1.33em;
            background-color: #555555;
        }
        
        .ima-slider-level-div {
            width: 100%;
            height: 0.667em;
            background-color: #ECC546;
        }
        
        .ima-fullscreen-div {
            left: auto;
            right: 0em;
        }
        
        .ima-playing:before {
            content: "\00f103";
        }
        
        .ima-paused:before {
            content: "\00f101";
        }
        
        .ima-playing:hover:before,
        .ima-paused:hover:before {
            text-shadow: 0 0 1em #fff;
        }
        
        .ima-non-muted:before {
            content: "\00f107";
        }
        
        .ima-muted:before {
            content: "\00f104";
        }
        
        .ima-non-muted:hover:before,
        .ima-muted:hover:before {
            text-shadow: 0 0 1em #fff;
        }
        
        .ima-non-fullscreen:before {
            content: "\00f108";
        }
        
        .ima-fullscreen:before {
            content: "\00f109";
        }
        
        .ima-non-fullscreen:hover:before,
        .ima-fullscreen:hover:before {
            text-shadow: 0 0 1em #fff;
        }
    </style>
    <style>
        vdo {
            display: block;
            clear: both;
        }
        
        .vdo_content {
            position: relative !important;
            /*z-index : 999999999999!important;*/
            margin: 0 auto !important;
            width: fit-content !important;
            width: intrinsic !important;
            width: -moz-max-content !important;
            width: -webkit-max-content !important;
            /* max-width: 660px; */
        }
        
        .vdo_floating {
            position: fixed !important;
            z-index: 999999999999 !important;
            transition: bottom 0.3s !important;
            width: auto !important;
        }
        
        .vdo-js {
            direction: ltr;
            position: relative;
        }
        
        .vdo_floating .vdo-js {
            box-shadow: 0 5px 11px rgba(0, 0, 0, 0.3) !important;
        }
        
        .vdo_content .vdo-js {
            box-shadow: none !important;
            margin: 0 auto;
            border-radius: 3%;
        }
        
        #vdo_logo {
            background: #fff!important;
            position: absolute;
            padding: 2px 10px;
            right: 0;
            bottom: 12px !important;
            width: 65px !important;
            z-index: 99999;
            border-top-left-radius: 8px;
            border-bottom-left-radius: 8px;
            transition: bottom 0.4s ease-in-out;
            height: 15px !important;
            font-size: 10px;
            line-height: 11px!important;
        }
        
        #vdo_banner_logo {
            background: #fff;
            position: absolute;
            padding: 2px 10px 3px 10px;
            right: 8px!important;
            bottom: 16px !important;
            width: 45px !important;
            z-index: 99999;
            border-top-left-radius: 8px;
            border-bottom-left-radius: 8px;
            transition: bottom 0.4s ease-in-out;
            height: 11px !important;
            font-size: 10px;
            box-sizing: content-box!important;
            line-height: 11px!important;
        }
        
        #vdo_logo img,
        #vdo_banner_logo img {
            margin: 0px !important;
            box-shadow: none !important;
            border-radius: 0px !important;
            padding: 0px !important;
            width: 100% !important;
            height: 11px !important;
            object-fit: unset !important;
            border: none !important;
        }
        
        div[id^="_vdo_ads_player_ai_"] #vdo_ai_cross {
            width: 17px !important;
            top: -6px !important;
            right: -6px !important;
            z-index: 999999999999999 !important;
            border-radius: 50%!important;
            cursor: pointer!important;
            position: absolute!important;
            margin: 0px !important;
            box-shadow: none !important;
            padding: 0px !important;
            height: 17px !important;
            border: none !important;
            filter: none!important;
            display: inherit;
        }
        /* .vdo-js .vjs-control-bar {
  overflow: hidden;
  width: 40px;
} */
        
        .vdo-js .vjs-control-bar {
            overflow: initial;
            width: 100% !important;
            transition: width 0.5s ease-in-out !important;
            background-color: transparent;
            height: 3.5em;
        }
        /* .vdo-js .vjs-control{
  position: fixed !important;
} */
        
        .vjs-error-display {
            margin: 0px !important;
        }
        
        .vjs-modal-dialog-content {
            margin: 0px !important;
        }
        /**
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
        
        .ima-ad-container {
            top: 0px;
            position: absolute;
            display: none;
            width: 100%;
            height: 100%;
            margin-top: 0px !important;
        }
        
        .ima-ad-container div:first-child,
        .ima-ad-container div:first-child div div {
            background-color: initial !important;
        }
        
        .vjs-text-track-display {
            margin-top: 0px !important;
            background-color: initial !important;
        }
        
        .ima-ad-container>div:first-child>div:first-child {
            position: initial !important;
        }
        /* Move overlay if user fast-clicks play button. */
        
        .vdo-js.vjs-playing .bumpable-ima-ad-container {
            margin-top: -40px;
        }
        /* Move overlay when controls are active. */
        
        .vdo-js.vjs-user-inactive.vjs-playing .bumpable-ima-ad-container {
            margin-top: 0px;
        }
        
        .vdo-js.vjs-paused .bumpable-ima-ad-container,
        .vdo-js.vjs-playing:hover .bumpable-ima-ad-container,
        .vdo-js.vjs-user-active.vjs-playing .bumpable-ima-ad-container {
            margin-top: -40px;
        }
        
        .ima-controls-div {
            bottom: 0px;
            height: 14px;
            position: absolute;
            overflow: hidden;
            display: none;
            opacity: 1;
            background-color: rgba(7, 20, 30, 0.7);
            background: -moz-linear-gradient( bottom, rgba(7, 20, 30, 0.7) 0%, rgba(7, 20, 30, 0) 100%);
            /* FF3.6+ */
            background: -webkit-gradient( linear, left bottom, left top, color-stop(0%, rgba(7, 20, 30, 0.7)), color-stop(100%, rgba(7, 20, 30, 0)));
            /* Chrome,Safari4+ */
            background: -webkit-linear-gradient( bottom, rgba(7, 20, 30, 0.7) 0%, rgba(7, 20, 30, 0) 100%);
            /* Chrome10+,Safari5.1+ */
            background: -o-linear-gradient( bottom, rgba(7, 20, 30, 0.7) 0%, rgba(7, 20, 30, 0) 100%);
            /* Opera 11.10+ */
            background: -ms-linear-gradient( bottom, rgba(7, 20, 30, 0.7) 0%, rgba(7, 20, 30, 0) 100%);
            /* IE10+ */
            background: linear-gradient( to top, rgba(7, 20, 30, 0.7) 0%, rgba(7, 20, 30, 0) 100%);
            /* W3C */
            filter: progid: DXImageTransform.Microsoft.gradient( startColorstr='#0007141E', endColorstr='#07141E', GradientType=0);
            /* IE6-9 */
        }
        
        .ima-controls-div.ima-controls-div-showing {
            height: 37px;
        }
        
        .ima-countdown-div {
            height: 10px;
            color: #ffffff;
            text-shadow: 0 0 0.2em #000;
            cursor: default;
            display: none!important;
        }
        
        .ima-seek-bar-div {
            top: 12px;
            height: 3px;
            position: absolute;
            background: rgba(255, 255, 255, 0.4);
            text-align: left;
        }
        
        div[id^=_vdo_ads_player_ai_] div[id$=_ima-progress-div].ima-progress-div {
            width: 0px;
            height: 3px;
            background-color: #ecc546!important;
        }
        
        .ima-play-pause-div,
        .ima-mute-div,
        .ima-slider-div,
        .ima-fullscreen-div {
            width: 35px;
            height: 20px;
            top: 11px;
            left: 0px;
            position: absolute;
            color: #cccccc;
            font-size: 1.5em;
            line-height: 2;
            text-align: center;
            font-family: VideoJS!important;
            cursor: pointer;
        }
        
        .vdo-vjs-small-buttons .ima-controls-div-showing .ima-play-pause-div,
        .vdo-vjs-small-buttons .ima-controls-div-showing .ima-mute-div,
        .vdo-vjs-small-buttons .ima-controls-div-showing .ima-slider-div,
        .vdo-vjs-small-buttons .ima-controls-div-showing .ima-fullscreen-div {
            top: -6px;
        }
        
        .vjs-icon-placeholder:before,
        .vdo-js .vjs-play-progress:before {
            font-family: VideoJS!important;
        }
        
        .ima-mute-div {
            left: auto;
            right: 155px;
        }
        
        .ima-slider-div {
            left: auto;
            right: 105px;
            width: 50px;
            height: 10px;
            top: 20px;
            background-color: #555555;
        }
        
        .ima-slider-level-div {
            width: 100%;
            height: 10px;
            background-color: #ecc546;
        }
        
        .ima-fullscreen-div {
            left: auto;
            right: 60px;
        }
        
        .ima-playing:before {
            content: "\00f103";
        }
        
        .ima-paused:before {
            content: "\00f101";
        }
        
        .ima-playing:hover:before,
        .ima-paused:hover:before {
            text-shadow: 0 0 1em #fff;
        }
        
        .ima-non-muted:before {
            content: "\00f107";
        }
        
        .ima-muted:before {
            content: "\00f104";
        }
        
        .ima-non-muted:hover:before,
        .ima-muted:hover:before {
            text-shadow: 0 0 1em #fff;
        }
        
        .ima-non-fullscreen:before {
            content: "\00f108";
        }
        
        .ima-fullscreen:before {
            content: "\00f109";
        }
        
        .ima-non-fullscreen:hover:before,
        .ima-fullscreen:hover:before {
            text-shadow: 0 0 1em #fff;
        }
        
        @-webkit-keyframes div-down-slide {
            0% {
                left: 0vw;
                top: 0vh;
            }
            100% {
                top: calc(100vh - 21.6vh);
                left: calc(100vw - 38.7vh);
            }
        }
        
        @-webkit-keyframes bounce {
            0% {
                top: 100%;
                left: 100%;
            }
            100% {
                top: 15%;
                left: 0%;
            }
        }
        
        @keyframes div-down-slide {
            0% {
                top: 0%;
                left: 0%;
            }
            100% {
                top: calc(100vh - 21.6vh);
                left: calc(100vw - 38.7vh);
            }
        }
        
        @keyframes bounce {
            0% {
                top: 100%;
                left: 100%;
            }
            100% {
                top: 15%;
                left: 0%;
            }
        }
        
        .Viewport_To_Bottom {
            position: fixed;
            right: 10px;
            bottom: 15px;
            float: right;
            -webkit-animation: div-down-slide 0.7s;
            animation: div-down-slide 0.7s;
        }
        
        .Viewport_To_Top {
            position: fixed;
            -webkit-animation: bounce 0.7s;
            animation: bounce 0.7s;
        }
        
        .vdo_fixed_div {
            position: fixed;
            top: calc(100vh - 21.6vh);
            left: calc(100vw - 38.7vh);
        }
        
        .vdo_header {
            position: fixed !important;
            top: 0px !important;
            z-index: 999999999 !important;
            background: #000 !important;
            left: 0px !important;
        }
        
        @media all and (-ms-high-contrast: none)
        /*IE11*/
        
        {
            *::-ms-backdrop,
            .vdo_logo img {
                vertical-align: middle;
                max-height: 10px;
            }
        }
        
        @media all and (-ms-high-contrast: none)
        /*IE11*/
        
        {
            _:-ms-fullscreen,
             :root .vdo_logo img {
                vertical-align: middle;
                max-height: 10px;
            }
        }
        
        .vdo-js video::-webkit-media-controls-panel,
        .vdo-js video::-webkit-media-controls-panel-container,
        .vdo-js video::-webkit-media-controls-start-playback-button {
            display: none !important;
            -webkit-appearance: none;
        }
        
        #vdo_mute_btn {
            width: 20px !important;
            height: 20px !important;
            z-index: 2147483647;
            position: absolute;
            background-color: rgba(255, 255, 255, 0.4);
            padding: 8px !important;
            box-sizing: content-box;
            border-radius: 18px !important;
            cursor: pointer !important;
            top: 5px !important;
            left: 5px !important;
        }
        /* #unitDivWrapper {
  background: url('https://vdo.ai/logo.svg');
  background-repeat: no-repeat;
  background-position: center;
  background-size: 500px;
} */
        
        div[id^=_vdo_ads_player_ai_] .ima-ad-container>div>iframe {
            width: 100%;
            height: 100%;
        }
        
        div[id^=_vdo_ads_player_ai_] #vdo_banner_frame {
            position: absolute;
            width: 100%;
            top: 0;
            left: 0;
            height: 100%;
            background: #ffffffa8;
            overflow: hidden;
        }
        
        div[id^=_vdo_ads_player_ai_] #FWMockedParent {
            margin: 0px!important;
        }
        
        div[id^=_vdo_ads_player_ai_] .freewheel-intext-roll div:first-child {
            display: none!important;
        }
        
        #vdo_banner_frame>vdo>iframe,
        #vdo_banner_frame>vdo>ins,
        #vdo_banner_frame>ins,
        #vdo_banner_frame>.vdo_campaign_frame {
            position: absolute!important;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        
        #vdo_banner_frame.vdo_banner>vdo>iframe {
            position: relative!important;
            top: 0;
            left: 0;
            transform: translate(0, 0);
        }
        
        #vdo_banner_frame>div[id^=div-gpt-ad] {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        
        #vdo_banner_frame #vdo_banner_progress,
        .vdo_carousel_ad_container #vdo_banner_progress {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background-color: #ffffff7c;
            box-shadow: 0px -5px 10px 10px rgba(0, 0, 0, 0.2);
        }
        
        #vdo_banner_frame #vdo_banner_progress #vdo_banner_progress_inner,
        .vdo_carousel_ad_container #vdo_banner_progress #vdo_banner_progress_inner {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0%;
            height: 100%;
            background-color: #f7f200;
            transition: width 30s cubic-bezier(1, 1, 0, 0);
        }
        
        .skip-ui-wrapper {
            cursor: pointer!important;
            /* padding: 15px 0 15px 15px; */
            pointer-events: auto!important;
            position: absolute!important;
            right: 0!important;
            z-index: 1000!important;
            bottom: 37px!important;
            right: 0!important;
            width: 105px!important;
            height: 40px!important;
            border: none!important;
        }
        
        .skip-ui-button {
            line-height: normal!important;
            min-width: 0!important;
            padding: 7px 6px 7px 10px!important;
            width: auto!important;
            margin: 0!important;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0)!important;
            background: rgba(0, 0, 0, 0.8)!important;
            border: 1px solid rgba(255, 255, 255, 0.5)!important;
            border-right: 0!important;
            box-sizing: content-box!important;
            color: #fff!important;
            cursor: pointer!important;
            direction: ltr!important;
            font-family: arial, sans-serif!important;
            font-weight: normal!important;
            font-size: 18px!important;
            text-align: center!important;
            width: 100%!important;
            box-sizing: border-box!important;
            height: inherit!important;
            border-radius: 0px!important;
        }
        
        .skip-ui-text {
            display: inline-block!important;
            font-size: 17px!important;
            vertical-align: middle!important;
            width: initial!important;
            text-transform: none!important;
            font-family: arial, sans-serif!important;
        }
        
        .skip-ui-icon-wrapper {
            display: inline-block!important;
            height: 24px!important;
            margin-left: 2px!important;
            vertical-align: middle!important;
            width: 24px!important;
        }
        
        .skip-ui-icon-wrapper>svg {
            fill: white!important;
            height: 24px!important;
            width: 24px!important;
            -webkit-filter: drop-shadow(0 1px 5px rgba(0, 0, 0, 0.2))!important;
            filter: drop-shadow(0 1px 5px rgba(0, 0, 0, 0.2))!important;
        }
        
        div[id^=_vdo_ads_player_ai_] button.vjs-seek-to-live-control,
        div[id^=_vdo_ads_player_ai_] button.vjs-picture-in-picture-control {
            display: none!important;
        }
        
        div[id^=_vdo_ads_player_ai_] button.vjs-fullscreen-control {
            margin-right: 60px!important;
        }
        
        #_vdo_ads_player_ai_1123 {
            margin: 0px!important;
        }
        /* Hiding the remainig time display in content videos */
        
        div[id^="_vdo_ads_player_ai_"] .vjs-remaining-time {
            display: none!important;
        }
        
        .vdo_next_stay_wrapper {
            position: absolute!important;
            width: 100%!important;
            height: 100%!important;
            top: 0!important;
            left: 0!important;
            pointer-events: none;
            /* background-color: rgb(138, 136, 136); */
            z-index: 99;
        }
        
        .vdo_controls_next_stay {
            position: absolute!important;
            left: 50%!important;
            top: 50%!important;
            transform: translate(-50%, calc(-50% + 22.5px))!important;
            pointer-events: all;
        }
        
        .vdo_controls_next_stay button {
            display: block;
            width: 100px;
            margin: 20px auto;
            padding: unset !important;
            height: 25px;
            border: .5px solid white;
            background: #6d6c6cc7;
            color: white;
            font-size: 14px;
            font-family: 'Roboto', sans-serif;
            pointer-events: all;
            border-radius: 4px;
            position: relative;
            overflow: hidden;
            cursor: pointer;
            box-shadow: rgb(0 0 0 / 31%) 7px 4px 12px 2px;
        }
        
        .vdo_controls_next_stay button span {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            border-radius: 4px;
            background: #efefef;
            width: 0%;
            z-index: -1;
            animation-name: fullWidth;
            animation-timing-function: linear;
            animation-fill-mode: forwards;
        }
        /* .vdo_control_next_button svg {
  width: 30px;
  height: 30px;
  fill: black;
} */
        
        .vdo_control_stay_button {
            border: none!important;
        }
        
        .vdo_control_next_button {
            width: 65px!important;
            height: 65px!important;
            border-radius: 50%!important;
            margin: 0 auto!important;
            position: relative;
        }
        
        .vdo_controls_next_stay button:focus,
        .vdo_controls_next_stay button:visited {
            outline: none;
        }
        
        @keyframes fullWidth {
            0% {
                width: 0%;
            }
            100% {
                width: 100%;
            }
        }
        
        .vdo-vjs-custom-skin {
            transform: translate(0px);
        }
        
        .vdo-vjs-custom-skin.vjs-user-active .vjs-tech,
        .vdo-vjs-custom-skin.vjs-paused .vjs-tech {
            filter: brightness(0.7);
        }
        
        .vjs-tech {
            transition: filter 0.5s;
            filter: brightness(1);
        }
        
        .vdo-js .vjs-control-bar button:focus {
            outline: 0;
        }
        
        .vdo-vjs-custom-skin .vjs-play-control {
            order: 0!important;
            position: absolute!important;
            top: 50%!important;
            left: 50%!important;
            width: 65px!important;
            height: 65px!important;
            transform: translate(-50%, -50%)!important;
            background-color: rgba(255, 255, 255, 0.2)!important;
            border-radius: 32.5px!important;
            z-index: 9;
        }
        
        .vdo-vjs-custom-skin .vjs-play-control:active {
            text-shadow: 0 0 1em #fff;
        }
        
        .vdo-vjs-custom-skin .vjs-play-control:focus {
            text-shadow: none!important;
        }
        
        .vdo-vjs-custom-skin .vjs-progress-control {
            order: 1!important;
            width: 100%!important;
            position: absolute!important;
            height: 0.5em!important;
            bottom: 0px!important;
            z-index: 2!important;
            top: unset!important;
        }
        
        .vdo-vjs-custom-skin .vjs-volume-panel {
            order: 3!important;
            direction: ltr!important;
            position: absolute!important;
            bottom: 0px;
            height: inherit!important;
            right: 100px;
        }
        
        .vdo-vjs-custom-skin .vjs-fullscreen-control {
            order: 2!important;
            position: absolute!important;
            bottom: 0px;
            height: inherit!important;
        }
        
        .vdo-vjs-custom-skin .vjs-volume-control {
            background-color: transparent!important;
        }
        
        .vdo-vjs-custom-skin .vjs-big-play-button {
            display: none!important;
        }
        
        .vdo-vjs-custom-skin .vjs-play-control .vjs-icon-placeholder:before {
            font-size: 45px!important;
            line-height: 65px!important;
            display: block!important;
        }
        
        .vdo-vjs-custom-skin .vjs-progress-holder {
            height: 0.5em!important;
            margin: 0px!important;
        }
        
        .vdo-vjs-custom-skin .vjs-play-progress {
            background: #c00!important;
        }
        
        .vdo-vjs-custom-skin .vjs-play-progress:before {
            display: none!important;
        }
        
        .vdo-vjs-custom-skin .vjs-control-bar {
            direction: rtl!important;
            position: unset!important;
            background: transparent!important;
        }
        
        .vdo-vjs-custom-skin .vjs-slider {
            background: rgba(255, 255, 255, 0.4)!important;
        }
        
        .vdo-vjs-custom-skin .vjs-volume-level {
            background-color: #c00!important;
        }
        
        .vdo-vjs-custom-skin .vjs-progress-control:hover .vjs-progress-holder {
            transform: translateY(-2px)!important;
        }
        
        .vdo-vjs-custom-skin .vjs-progress-control {
            pointer-events: none;
        }
        
        .vdo-vjs-custom-skin .vjs-load-progress div {
            background: rgba(255, 255, 255, 0.6)!important;
        }
        
        .vdo-vjs-custom-skin .vjs-loading-spinner:after,
        .vdo-vjs-custom-skin .vjs-loading-spinner:before {
            margin: -3px!important;
        }
        
        .vjs-seeking .vjs-loading-spinner:after,
        .vjs-seeking .vjs-loading-spinner:before,
        .vjs-waiting .vjs-loading-spinner:after,
        .vjs-waiting .vjs-loading-spinner:before {
            animation: vjs-spinner-spin 1.1s linear infinite!important;
        }
        
        .vdo-vjs-custom-skin .vjs-loading-spinner:after {
            display: none!important;
        }
        
        .vdo-vjs-custom-skin .vjs-loading-spinner {
            border: 3px solid rgba(43, 51, 63, .7)!important;
            width: 68px!important;
            height: 68px!important;
            margin: 0px!important;
            transform: translate(-50%, -50%)!important;
            border-radius: 50%!important;
        }
        
        .vdo_circle_progress {
            animation-name: animateCircle!important;
            animation-timing-function: linear!important;
            animation-fill-mode: forwards!important;
            /* stroke-dasharray: 480; */
            fill: #949494bf!important;
            stroke: white;
            stroke-width: 3!important;
            cursor: pointer;
        }
        
        @keyframes animateCircle {
            from {
                stroke-dasharray: 195;
            }
            to {
                stroke-dasharray: 390;
            }
        }
        
        #vdo_forward_next_icon {
            position: absolute;
            width: 25px;
            height: 25px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            fill: white;
        }
        
        .vdo-vjs-custom-skin .ima-controls-div {
            height: 5px;
            top: unset!important;
            /* background: transparent; */
        }
        
        .vdo-vjs-custom-skin .ima-controls-div.ima-controls-div-showing {
            height: 40px;
        }
        
        .vdo-vjs-custom-skin.vdo-vjs-small-buttons .ima-controls-div.ima-controls-div-showing {
            height: 20px;
        }
        
        .vdo-vjs-custom-skin .ima-seek-bar-div {
            width: 100%;
            top: unset;
            bottom: 0px;
            left: 0px;
            right: unset;
            height: 5px;
            background: rgba(0, 0, 0, 0.3);
        }
        
        .vdo-vjs-custom-skin .ima-progress-div {
            height: 5px!important;
        }
        /* .vdo-vjs-custom-skin .ima-ad-container > div > div > video {
  transition: filter 0.5s linear!important;
  filter: brightness(1);
}

.vdo-vjs-custom-skin.vjs-user-active .ima-ad-container > div > div > video {
  filter: brightness(0.9);
} */
        
        button.vjs-paused.vjs-ended {
            display: none;
        }
        
        .vdo-vjs-custom-skin .vjs-volume-panel.vjs-control {
            top: unset !important;
        }
        
        .vdo-vjs-custom-skin .vjs-volume-control.vjs-control.vjs-volume-vertical {
            top: unset !important;
        }
        
        #vdo_ai_side_banner_wrapper {
            width: 180px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        
        .vdo_ai_side_banner_frame {
            border: none;
            width: 180px;
            height: 180px;
            display: block;
        }
        
        #vdoCarouselWrapper {
            /* width: 500px;
  max-width: 600px; */
            position: relative;
            transition: max-width 0.2s linear;
        }
        
        #vdo_carousel {
            overflow: auto;
            scroll-behavior: smooth;
            scrollbar-width: none;
        }
        
        #vdo_carousel::-webkit-scrollbar {
            height: 0;
        }
        
        #vdo_carousel_content {
            display: grid;
            grid-gap: 12px;
            grid-auto-flow: column;
            margin: auto;
            box-sizing: border-box;
        }
        
        .vdo_carousel_image_item {
            background-size: cover !important;
            background-position: center !important;
            position: relative;
            overflow: hidden;
        }
        
        .vdo_carousel_title_player {
            position: absolute;
            color: white;
            font-weight: bold;
            text-shadow: 1px 1px black;
            margin-left: 4%;
            font-family: Raleway, sans-serif !important;
            line-height: 20px;
            font-size: 92%;
        }
        
        .vdo_carousel_image_item:hover .vdo_carousel_title_player {
            bottom: 0;
            top: unset !important;
        }
        
        div[id*='parentDiv']::-webkit-scrollbar {
            height: 0;
            background: transparent;
        }
        
        @media only screen and (max-device-width: 667px) {
            vdo[id*='unitDivWrapper'] {
                flex-direction: column;
            }
            #vdoCarouselWrapper {
                margin: 0 auto !important;
                margin-top: 10px !important;
                position: relative;
            }
            .vdo_carousel_timer_wrapper {
                display: none!important;
            }
        }
        
        vdo[id*='unitDivWrapper'] {
            transition: height .6s linear;
            animation-direction: normal;
            overflow-y: hidden;
        }
        
        .vdo_collapsible .vdo_floating {
            bottom: -500px !important;
            transition: bottom .6s linear !important;
            animation-direction: reverse;
        }
        
        .vdo_collapsible_floating {
            bottom: -500px !important;
            transition: bottom .6s linear !important;
            animation-direction: reverse;
        }
        /* .vdo_collapsible_floating {
  bottom: -500px !important;
  transition: bottom 1s linear !important;
  animation-direction: reverse;
}

.vdo_collapsible_content {
  transition: height 1s linear;
  animation-direction: normal;
} */
        
        .vdo_carousel_timer_wrapper {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 16px;
            background: transparent;
            z-index: 3;
            display: flex;
            justify-content: space-around;
            align-items: center;
        }
        
        .vdo_carousel_timer_bar {
            height: 4px;
            background: #d6d3d3;
            width: 95%;
            border-radius: 2.5px;
            position: relative;
            overflow: hidden;
        }
        
        .vdoCarouselTimerAnimation {
            animation: timerFillAnimation 8s linear;
            animation-fill-mode: forwards;
            animation-iteration-count: 1;
        }
        
        .vdo_carousel_timer_span {
            display: block;
            position: absolute;
            top: 0;
            height: 100%;
            left: 0;
            width: 10%;
            background: red;
        }
        
        @keyframes timerFillAnimation {
            0% {
                width: 0%;
            }
            100% {
                width: 100%;
            }
        }
        
        .vdoCarouselShake {
            animation: vdoCarouselShake 0.8s;
            animation-iteration-count: 1;
        }
        
        @keyframes vdoCarouselShake {
            0% {
                transform: translateX(0px);
            }
            12.5% {
                transform: translateX(-15px);
            }
            25% {
                transform: translateX(15px);
            }
            37.5% {
                transform: translateX(-14px);
            }
            50% {
                transform: translateX(14px);
            }
            62.5% {
                transform: translateX(-10px);
            }
            75% {
                transform: translateX(10px);
            }
            87.5% {
                transform: translateX(-5px);
            }
            100% {
                transform: translateX(5px);
            }
        }
        
        .ima-ad-container>div:first-child>div:first-child>video {
            border-radius: 3%;
            transition: width 0.2s linear;
        }
        
        video-js.vdo-js {
            transition: width 0.2s linear;
            margin: 0 auto;
        }
        
        .vdo_carousel_ad_container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #d3d3d37d;
            z-index: 9;
            overflow: hidden;
            border-radius: 3%;
        }
        
        .vdo_carousel_banner_ad_slot,
        .vdo_carousel_video_ad_slot {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border: none;
        }
        
        .vdo_carousel_mobile_div {
            overflow: hidden;
        }
        
        .vdo_carousel_mobile_div .vdo_content {
            margin: 0px!important;
        }
        
        #vdo_articles_top_bar {
            display: flex !important;
            justify-content: space-between!important;
            padding: 5px 10px!important;
            font-family: sans-serif!important;
        }
        
        #vdo_articles_top_bar h4 {
            margin: 0px!important;
        }
        
        #vdo_articles_top_bar p,
        #vdo_articles_top_bar a {
            margin: 0px!important;
            font-size: 14px!important;
            width: 100%!important;
            text-align: right!important;
            font-family: arial, sans-serif!important;
        }
        
        .vdo-video-hidden .vjs-tech {
            filter: brightness(0)!important;
        }
        
        .vdo-black-background {
            background-color: black;
        }
        
        #vdo-spinner-loading {
            position: absolute!important;
            left: -4%!important;
            top: -4%!important;
            display: inline-block;
            width: 71px;
            height: 71px;
            border: 3px solid rgba(255, 255, 255, .3);
            border-radius: 50%;
            border-top-color: #fff;
            animation: vdo-spin 1s ease-in-out infinite;
            -webkit-animation: vdo-spin 1s ease-in-out infinite;
            cursor: pointer;
        }
        
        @keyframes vdo-spin {
            to {
                -webkit-transform: rotate(360deg);
            }
        }
        
        @-webkit-keyframes vdo-spin {
            to {
                -webkit-transform: rotate(360deg);
            }
        }
        
        .vdo_content_custom_passback {
            background-color: #d3d3d37d;
            position: relative;
        }
        
        .vdo_content_custom_passback>div {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        
        #vdo_playlist_gallery_wrapper {
            overflow-y: auto;
            overflow-x: hidden;
            margin-left: auto;
            padding-left: 5px;
            display: flex;
            flex-direction: column;
        }
        
        #vdo_playlist_gallery_wrapper::-webkit-scrollbar {
            display: none;
        }
        
        #vdo_playlist_gallery_wrapper {
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }
        
        .vdo_playlist_item {
            position: relative;
            cursor: pointer;
            margin-bottom: 2px;
        }
        
        .vdo_playlist_item img {
            width: 100% !important;
            filter: brightness(0.7);
            border-radius: 5px
        }
        
        .vdo_playlist_item.active img {
            filter: brightness(0.5);
        }
        
        .vdo_playlist_item>div {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 22%;
            height: auto;
            color: #f0f8ff;
            text-align: center;
            text-shadow: 2px 2px 5px black;
            font-family: sans-serif;
            font-size: 17px;
        }
        
        .vdo_playlist_item>div>svg {
            width: 100%;
            fill: #f0f8ff;
            height: 100%;
        }
        
        .vdo_up_next_text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #ffffff;
            text-shadow: 0 0 6px black;
            font-family: sans-serif;
            font-size: 17px;
            /* box-shadow: 0px 0px 20px 0px rgb(0 0 0 / 20%); */
            width: 100%;
            height: 100%;
            text-align: center;
            line-height: 85px;
            background: #00000070;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 4px;
        }
        
        .vdo_playlist_circle {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-48.5%, -54%) rotate(-90deg);
            width: 63px!important;
            height: 63px!important;
            stroke-dasharray: 190;
            /* transition: stroke-dashoffset 5s linear; */
            stroke-dashoffset: 190;
        }
        
        #vdo_playlist_current_active {
            width: 65%;
            padding: 6px 0px;
        }
        
        vdo[id*='unitDivWrapper']::-webkit-scrollbar {
            display: none;
        }
        
        vdo[id*='unitDivWrapper'] {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        
        .vdo-video-hidden .vdo_custom_poster {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
        
        .vdo-autoplay-disabled .vjs-poster {
            display: block;
        }
        
        .vdo_ads_wrapper {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: none;
            z-index: 9;
        }
        
        .vdo_ads_wrapper>div>div:nth-child(3) {
            display: none;
        }
        
        .vdo_ads_controls_wrapper {
            z-index: 999999999999;
            position: absolute;
            bottom: 0px;
            left: 0px;
            padding: 0px;
            width: 100%;
            background: #00000069;
            box-sizing: border-box;
            display: none;
        }
        
        .vdo_controls_active .vdo_ads_controls_wrapper {
            display: block!important;
        }
        
        .vdo_ads_controls_wrapper .play-pause svg {
            width: 9px;
            height: 15px;
            fill: white;
        }
        
        .control-div {
            background-image: linear-gradient(360deg, rgb(0 0 0 / 19%) 34%, rgba(0, 0, 0, 0) 110%);
        }
    </style>
    <script async="" src="checkout_archivos/js_003.js"></script>
    <style type="text/css">
        .vjs-youtube .vjs-iframe-blocker {
            display: none;
        }
        
        .vjs-youtube.vjs-user-inactive .vjs-iframe-blocker {
            display: block;
        }
        
        .vjs-youtube .vjs-poster {
            background-size: cover;
        }
        
        .vjs-youtube-mobile .vjs-big-play-button {
            display: none;
        }
    </style>
    <meta http-equiv="origin-trial" content="A7D05fL9zBqt11RE193XmJzeo4RPtGLsV822r1Bivfn7OUM0YRLJQcJVPgMdvq7u5hLUS/KmNIpe9fz+VE/dUg4AAACJeyJvcmlnaW4iOiJodHRwczovL2ltYXNkay5nb29nbGVhcGlzLmNvbTo0NDMiLCJmZWF0dXJlIjoiQ29udmVyc2lvbk1lYXN1cmVtZW50IiwiZXhwaXJ5IjoxNjQzMTU1MTk5LCJpc1RoaXJkUGFydHkiOnRydWUsInVzYWdlIjoic3Vic2V0In0=">
    <div id="_bsa_srv-CKYDL2JN_2"></div>
    <meta http-equiv="origin-trial" content="A7D05fL9zBqt11RE193XmJzeo4RPtGLsV822r1Bivfn7OUM0YRLJQcJVPgMdvq7u5hLUS/KmNIpe9fz+VE/dUg4AAACJeyJvcmlnaW4iOiJodHRwczovL2ltYXNkay5nb29nbGVhcGlzLmNvbTo0NDMiLCJmZWF0dXJlIjoiQ29udmVyc2lvbk1lYXN1cmVtZW50IiwiZXhwaXJ5IjoxNjQzMTU1MTk5LCJpc1RoaXJkUGFydHkiOnRydWUsInVzYWdlIjoic3Vic2V0In0=">
</head>

<body>
    <script src="checkout_archivos/monetization.js" type="text/javascript"></script>
    <script>
        (function() {
            if (typeof _bsa !== 'undefined' && _bsa) {
                // format, zoneKey, segment:value, options
                _bsa.init('flexbar', 'CKYI627U', 'placement:w3layoutscom');
            }
        })();
    </script>
    <script>
        (function() {
            if (typeof _bsa !== 'undefined' && _bsa) {
                // format, zoneKey, segment:value, options
                _bsa.init('fancybar', 'CKYDL2JN', 'placement:demo');
            }
        })();
    </script>
    <script>
        (function() {
            if (typeof _bsa !== 'undefined' && _bsa) {
                // format, zoneKey, segment:value, options
                _bsa.init('stickybox', 'CKYI653J', 'placement:w3layoutscom');
            }
        })();
    </script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async="" src="checkout_archivos/js.js"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-149859901-1');
    </script>

    <script>
        window.ga = window.ga || function() {
            (ga.q = ga.q || []).push(arguments)
        };
        ga.l = +new Date;
        ga('create', 'UA-149859901-1', 'demo.w3layouts.com');
        ga('require', 'eventTracker');
        ga('require', 'outboundLinkTracker');
        ga('require', 'urlChangeTracker');
        ga('send', 'pageview');
    </script>
    <script async="" src="checkout_archivos/autotrack.js"></script>

    <meta name="robots" content="noindex">
    <link rel="stylesheet" href="checkout_archivos/font-awesome.css">
    <!-- New toolbar-->
    <style>
        * {
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
        }
        
        #w3lDemoBar.w3l-demo-bar {
            top: 0;
            right: 0;
            bottom: 0;
            z-index: 9999;
            padding: 40px 5px;
            padding-top: 70px;
            margin-bottom: 70px;
            background: #0D1326;
            border-top-left-radius: 9px;
            border-bottom-left-radius: 9px;
        }
        
        #w3lDemoBar.w3l-demo-bar a {
            display: block;
            color: #e6ebff;
            text-decoration: none;
            line-height: 24px;
            opacity: .6;
            margin-bottom: 20px;
            text-align: center;
        }
        
        #w3lDemoBar.w3l-demo-bar span.w3l-icon {
            display: block;
        }
        
        #w3lDemoBar.w3l-demo-bar a:hover {
            opacity: 1;
        }
        
        #w3lDemoBar.w3l-demo-bar .w3l-icon svg {
            color: #e6ebff;
        }
        
        #w3lDemoBar.w3l-demo-bar .responsive-icons {
            margin-top: 30px;
            border-top: 1px solid #41414d;
            padding-top: 40px;
        }
        
        #w3lDemoBar.w3l-demo-bar .demo-btns {
            border-top: 1px solid #41414d;
            padding-top: 30px;
        }
        
        #w3lDemoBar.w3l-demo-bar .responsive-icons a span.fa {
            font-size: 26px;
        }
        
        #w3lDemoBar.w3l-demo-bar .no-margin-bottom {
            margin-bottom: 0;
        }
        
        .toggle-right-sidebar span {
            background: #0D1326;
            width: 50px;
            height: 50px;
            line-height: 50px;
            text-align: center;
            color: #e6ebff;
            border-radius: 50px;
            font-size: 26px;
            cursor: pointer;
            opacity: .5;
        }
        
        .pull-right {
            float: right;
            position: fixed;
            right: 0px;
            top: 70px;
            width: 90px;
            z-index: 99999;
            text-align: center;
        }
        /* ============================================================
RIGHT SIDEBAR SECTION
============================================================ */
        
        #right-sidebar {
            width: 90px;
            position: fixed;
            height: 100%;
            z-index: 1000;
            right: 0px;
            top: 0;
            margin-top: 60px;
            -webkit-transition: all .5s ease-in-out;
            -moz-transition: all .5s ease-in-out;
            -o-transition: all .5s ease-in-out;
            transition: all .5s ease-in-out;
            overflow-y: auto;
        }
        /* ============================================================
RIGHT SIDEBAR TOGGLE SECTION
============================================================ */
        
        .hide-right-bar-notifications {
            margin-right: -300px !important;
            -webkit-transition: all .3s ease-in-out;
            -moz-transition: all .3s ease-in-out;
            -o-transition: all .3s ease-in-out;
            transition: all .3s ease-in-out;
        }
        
        @media (max-width: 992px) {
            #w3lDemoBar.w3l-demo-bar a.desktop-mode {
                display: none;
            }
        }
        
        @media (max-width: 767px) {
            #w3lDemoBar.w3l-demo-bar a.tablet-mode {
                display: none;
            }
        }
        
        @media (max-width: 568px) {
            #w3lDemoBar.w3l-demo-bar a.mobile-mode {
                display: none;
            }
            #w3lDemoBar.w3l-demo-bar .responsive-icons {
                margin-top: 0px;
                border-top: none;
                padding-top: 0px;
            }
            #right-sidebar,
            .pull-right {
                width: 90px;
            }
            #w3lDemoBar.w3l-demo-bar .no-margin-bottom-mobile {
                margin-bottom: 0;
            }
        }
    </style>
    <!-- <div class="pull-right toggle-right-sidebar">
        <span class="fa title-open-right-sidebar tooltipstered fa-angle-double-right"></span>
    </div> -->

    <div id="right-sidebar" class="right-sidebar-notifcations nav-collapse">
        <div class="bs-example bs-example-tabs right-sidebar-tab-notification" data-example-id="togglable-tabs">

            <!-- <div id="w3lDemoBar" class="w3l-demo-bar">
                <div class="demo-btns">
                    <a href="https://w3layouts.com/?p=">
                        <span class="w3l-icon -back">
                <span class="fa fa-arrow-left"></span>
                        </span>
                        <span class="w3l-text">Back</span>
                    </a>
                    <a href="https://w3layouts.com/?p=">
                        <span class="w3l-icon -download">
                <span class="fa fa-download"></span>
                        </span>
                        <span class="w3l-text">Download</span>
                    </a>
                    <a href="https://w3layouts.com/checkout/?add-to-cart=" class="no-margin-bottom-mobile">
                        <span class="w3l-icon -buy">
                <span class="fa fa-shopping-cart"></span>
                        </span>
                        <span class="w3l-text">Buy</span>
                    </a>
                </div> -->
            <!---<div class="responsive-icons">
            <a href="#url" class="desktop-mode">
                <span class="w3l-icon -desktop">
                    <span class="fa fa-desktop"></span>
                </span>
            </a>
            <a href="#url" class="tablet-mode">
                <span class="w3l-icon -tablet">
                    <span class="fa fa-tablet"></span>
                </span>
            </a>
            <a href="#url" class="mobile-mode no-margin-bottom">
                <span class="w3l-icon -mobile">
                    <span class="fa fa-mobile"></span>
                </span>
            </a>
        </div>-->
        </div>
        <div class="right-sidebar-panel-content animated fadeInRight" tabindex="5003" style="overflow: hidden; outline: none;">
        </div>
    </div>
    </div>


    <!-- top-header -->
    <!-- <div class="header-most-top">
        <p>Grocery Offer Zone Top Deals &amp; Discounts</p>
    </div> -->
    <!-- //top-header -->
    <!-- header-bot-->
    <div class="header-bot">
        <div class="header-bot_inner_wthreeinfo_header_mid">
            <!-- header-bot-->
            <div class="col-md-4 logo_agile">
                <h1>
                    <a href="index.html">
                        <span>G</span>rocery
                        <span>S</span>hoppy
                        <img src="checkout_archivos/logo2.png" alt=" ">
                    </a>
                </h1>
            </div>
            <!-- header-bot -->
            <div class="col-md-8 header">
                <!-- header lists -->
                <!-- <ul>
                    <li>
                        <a class="play-icon popup-with-zoom-anim" href="#small-dialog1">
                            <span class="fa fa-map-marker" aria-hidden="true"></span> Shop Locator</a>
                    </li>
                    <li>
                        <a href="#" data-toggle="modal" data-target="#myModal1">
                            <span class="fa fa-truck" aria-hidden="true"></span>Track Order</a>
                    </li>
                    <li>
                        <span class="fa fa-phone" aria-hidden="true"></span> 001 234 5678
                    </li>
                    <li>
                        <a href="#" data-toggle="modal" data-target="#myModal1">
                            <span class="fa fa-unlock-alt" aria-hidden="true"></span> Sign In </a>
                    </li>
                    <li>
                        <a href="#" data-toggle="modal" data-target="#myModal2">
                            <span class="fa fa-pencil-square-o" aria-hidden="true"></span> Sign Up </a>
                    </li>
                </ul> -->
                <!-- //header lists -->
                <!-- search -->
                <div class="agileits_search">
                    <form action="#" method="post">
                        <input name="Search" type="search" placeholder="How can we help you today?" required="">
                        <button type="submit" class="btn btn-default" aria-label="Left Align">
							<span class="fa fa-search" aria-hidden="true"> </span>
						</button>
                    </form>
                </div>
                <!-- //search -->
                <!-- cart details -->
                <div class="top_nav_right">
                    <div class="wthreecartaits wthreecartaits2 cart cart box_1">
                        <form action="#" method="post" class="last">
                            <input type="hidden" name="cmd" value="_cart">
                            <input type="hidden" name="display" value="1">
                            <button class="w3view-cart" type="submit" name="submit" value="">
								<i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
							</button>
                        </form>
                    </div>
                </div>
                <!-- //cart details -->
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- shop locator (popup) -->
    <!-- Button trigger modal(shop-locator) -->
    <div id="small-dialog1" class="mfp-hide">
        <div class="select-city">
            <h3>Please Select Your Location</h3>
            <select class="list_of_cities">
				<optgroup label="Popular Cities">
					<option selected="selected" style="display:none;color:#eee;">Select City</option>
					<option>Birmingham</option>
					<option>Anchorage</option>
					<option>Phoenix</option>
					<option>Little Rock</option>
					<option>Los Angeles</option>
					<option>Denver</option>
					<option>Bridgeport</option>
					<option>Wilmington</option>
					<option>Jacksonville</option>
					<option>Atlanta</option>
					<option>Honolulu</option>
					<option>Boise</option>
					<option>Chicago</option>
					<option>Indianapolis</option>
				</optgroup>
				<optgroup label="Alabama">
					<option>Birmingham</option>
					<option>Montgomery</option>
					<option>Mobile</option>
					<option>Huntsville</option>
					<option>Tuscaloosa</option>
				</optgroup>
				<optgroup label="Alaska">
					<option>Anchorage</option>
					<option>Fairbanks</option>
					<option>Juneau</option>
					<option>Sitka</option>
					<option>Ketchikan</option>
				</optgroup>
				<optgroup label="Arizona">
					<option>Phoenix</option>
					<option>Tucson</option>
					<option>Mesa</option>
					<option>Chandler</option>
					<option>Glendale</option>
				</optgroup>
				<optgroup label="Arkansas">
					<option>Little Rock</option>
					<option>Fort Smith</option>
					<option>Fayetteville</option>
					<option>Springdale</option>
					<option>Jonesboro</option>
				</optgroup>
				<optgroup label="California">
					<option>Los Angeles</option>
					<option>San Diego</option>
					<option>San Jose</option>
					<option>San Francisco</option>
					<option>Fresno</option>
				</optgroup>
				<optgroup label="Colorado">
					<option>Denver</option>
					<option>Colorado</option>
					<option>Aurora</option>
					<option>Fort Collins</option>
					<option>Lakewood</option>
				</optgroup>
				<optgroup label="Connecticut">
					<option>Bridgeport</option>
					<option>New Haven</option>
					<option>Hartford</option>
					<option>Stamford</option>
					<option>Waterbury</option>
				</optgroup>
				<optgroup label="Delaware">
					<option>Wilmington</option>
					<option>Dover</option>
					<option>Newark</option>
					<option>Bear</option>
					<option>Middletown</option>
				</optgroup>
				<optgroup label="Florida">
					<option>Jacksonville</option>
					<option>Miami</option>
					<option>Tampa</option>
					<option>St. Petersburg</option>
					<option>Orlando</option>
				</optgroup>
				<optgroup label="Georgia">
					<option>Atlanta</option>
					<option>Augusta</option>
					<option>Columbus</option>
					<option>Savannah</option>
					<option>Athens</option>
				</optgroup>
				<optgroup label="Hawaii">
					<option>Honolulu</option>
					<option>Pearl City</option>
					<option>Hilo</option>
					<option>Kailua</option>
					<option>Waipahu</option>
				</optgroup>
				<optgroup label="Idaho">
					<option>Boise</option>
					<option>Nampa</option>
					<option>Meridian</option>
					<option>Idaho Falls</option>
					<option>Pocatello</option>
				</optgroup>
				<optgroup label="Illinois">
					<option>Chicago</option>
					<option>Aurora</option>
					<option>Rockford</option>
					<option>Joliet</option>
					<option>Naperville</option>
				</optgroup>
				<optgroup label="Indiana">
					<option>Indianapolis</option>
					<option>Fort Wayne</option>
					<option>Evansville</option>
					<option>South Bend</option>
					<option>Hammond</option>														       
				</optgroup>
				<optgroup label="Iowa">
					<option>Des Moines</option>
					<option>Cedar Rapids</option>
					<option>Davenport</option>
					<option>Sioux City</option>
					<option>Waterloo</option>       													
				</optgroup>
				<optgroup label="Kansas">
					<option>Wichita</option>
					<option>Overland Park</option>
					<option>Kansas City</option>
					<option>Topeka</option>
					<option>Olathe  </option>            													
				</optgroup>
				<optgroup label="Kentucky">
					<option>Louisville</option>
					<option>Lexington</option>
					<option>Bowling Green</option>
					<option>Owensboro</option>
					<option>Covington</option>        														
				</optgroup>
				<optgroup label="Louisiana">
					<option>New Orleans</option>
					<option>Baton Rouge</option>
					<option>Shreveport</option>
					<option>Metairie</option>
					<option>Lafayette</option>          														
				</optgroup>
				<optgroup label="Maine">
					<option>Portland</option>
					<option>Lewiston</option>
					<option>Bangor</option>
					<option>South Portland</option>
					<option>Auburn</option>         														
				</optgroup>
				<optgroup label="Maryland">
					<option>Baltimore</option>
					<option>Frederick</option>
					<option>Rockville</option>
					<option>Gaithersburg</option>
					<option>Bowie</option>         														
				</optgroup>
				<optgroup label="Massachusetts">
					<option>Boston</option>
					<option>Worcester</option>
					<option>Springfield</option>
					<option>Lowell</option>
					<option>Cambridge</option>  
				</optgroup>
				<optgroup label="Michigan">
					<option>Detroit</option>
					<option>Grand Rapids</option>
					<option>Warren</option>
					<option>Sterling Heights</option>
					<option>Lansing</option> 
				</optgroup>
				<optgroup label="Minnesota">
					<option>Minneapolis</option>
					<option>St. Paul</option>
					<option>Rochester</option>
					<option>Duluth</option>
					<option>Bloomington</option>      														
				</optgroup>
				<optgroup label="Mississippi">
					<option>Jackson</option>
					<option>Gulfport</option>
					<option>Southaven</option>
					<option>Hattiesburg</option>
					<option>Biloxi</option>         														
				</optgroup>
				<optgroup label="Missouri">
					<option>Kansas City</option>
					<option>St. Louis</option>
					<option>Springfield</option>
					<option>Independence</option>
					<option>Columbia</option>            														
				</optgroup>
				<optgroup label="Montana">
					<option>Billings</option>
					<option>Missoula</option>
					<option>Great Falls</option>
					<option>Bozeman</option>
					<option>Butte-Silver Bow</option>         														
				</optgroup>
				<optgroup label="Nebraska">
					<option>Omaha</option>
					<option>Lincoln</option>
					<option>Bellevue</option>
					<option>Grand Island</option>
					<option>Kearney</option>        													
				</optgroup>
				<optgroup label="Nevada">
					<option>Las Vegas</option>
					<option>Henderson</option>
					<option>North Las Vegas</option>
					<option>Reno</option>
					<option>Sunrise Manor</option>            													
				</optgroup>
				<optgroup label="New Hampshire">
					<option>Manchesters</option>
					<option>Nashua</option>
					<option>Concord</option>
					<option>Dover</option>
					<option>Rochester</option>              													
				</optgroup>
				<optgroup label="New Jersey">
					<option>Newark</option>
					<option>Jersey City</option>
					<option>Paterson</option>
					<option>Elizabeth</option>
					<option>Edison</option> 
				</optgroup>
				<optgroup label="New Mexico">
					<option>Albuquerque</option>
					<option>Las Cruces</option>
					<option>Rio Rancho</option>
					<option>Santa Fe</option>
					<option>Roswell</option>       
				</optgroup>
				<optgroup label="New York">
					<option>New York</option>
					<option>Buffalo</option>
					<option>Rochester</option>
					<option>Yonkers</option>
					<option>Syracuse</option>        														
				</optgroup>
				<optgroup label="North Carolina">
					<option>Charlotte</option>
					<option>Raleigh</option>
					<option>Greensboro</option>
					<option>Winston-Salem</option>
					<option>Durham</option>          														
				</optgroup>
				<optgroup label="North Dakota">
					<option>Fargo</option>
					<option>Bismarck</option>
					<option>Grand Forks</option>
					<option>Minot</option>
					<option>West Fargo</option>
				</optgroup>
				<optgroup label="Ohio">
					<option>Columbus</option>
					<option>Cleveland</option>
					<option>Cincinnati</option>
					<option>Toledo</option>
					<option>Akron</option>      
				</optgroup>
				<optgroup label="Oklahoma">
					<option>Oklahoma City</option>
					<option>Tulsa</option>
					<option>Norman</option>
					<option>Broken Arrow</option>
					<option>Lawton</option>        														
				</optgroup>
				<optgroup label="Oregon">
					<option>Portland</option>
					<option>Eugene</option>
					<option>Salem</option>
					<option>Gresham</option>
					<option>Hillsboro</option>          														
				</optgroup>
				<optgroup label="Pennsylvania">
					<option>Philadelphia</option>
					<option>Pittsburgh</option>
					<option>Allentown</option>
					<option>Erie</option>
					<option>Reading</option>         														
				</optgroup>
				<optgroup label="Rhode Island">
					<option>Providence</option>
					<option>Warwick</option>
					<option>Cranston</option>
					<option>Pawtucket</option>
					<option>East Providence</option>   
				</optgroup>
				<optgroup label="South Carolina">
					<option>Columbia</option>
					<option>Charleston</option>
					<option>North Charleston</option>
					<option>Mount Pleasant</option>
					<option>Rock Hill</option> 
				</optgroup>
				<optgroup label="South Dakota">
					<option>Sioux Falls</option>
					<option>Rapid City</option>
					<option>Aberdeen</option>
					<option>Brookings</option>
					<option>Watertown</option> 
				</optgroup>
				<optgroup label="Tennessee">
					<option>Memphis</option>
					<option>Nashville</option>
					<option>Knoxville</option>
					<option>Chattanooga</option>
					<option>Clarksville</option>       
				</optgroup>
				<optgroup label="Texas">
					<option>Houston</option>
					<option>San Antonio</option>
					<option>Dallas</option>
					<option>Austin</option>
					<option>Fort Worth</option>   
				</optgroup>
				<optgroup label="Utah">
					<option>Salt Lake City</option>
					<option>West Valley City</option>
					<option>Provo</option>
					<option>West Jordan</option>
					<option>Orem</option>   
				</optgroup>	
				<optgroup label="Vermont">
					<option>Burlington</option>
					<option>Essex</option>
					<option>South Burlington</option>
					<option>Colchester</option>
					<option>Rutland</option>   
				</optgroup>
				<optgroup label="Virginia">
					<option>Virginia Beach</option>
					<option>Norfolk</option>
					<option>Chesapeake</option>
					<option>Arlington</option>
					<option>Richmond</option> 
				</optgroup>	
				<optgroup label="Washington">
					<option>Seattle</option>
					<option>Spokane</option>
					<option>Tacoma</option>
					<option>Vancouver</option>
					<option>Bellevue</option> 
				</optgroup>	
				<optgroup label="West Virginia">
					<option>Charleston</option>
					<option>Huntington</option>
					<option>Parkersburg</option>
					<option>Morgantown</option>
					<option>Wheeling</option> 
				</optgroup>	
				<optgroup label="Wisconsin">
					<option>Milwaukee</option>
					<option>Madison</option>
					<option>Green Bay</option>
					<option>Kenosha</option>
					<option>Racine</option>
				</optgroup>
				<optgroup label="Wyoming">
					<option>Cheyenne</option>
					<option>Casper</option>
					<option>Laramie</option>
					<option>Gillette</option>
					<option>Rock Springs</option>
				</optgroup>
			</select>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- //shop locator (popup) -->
    <!-- signin Model -->
    <!-- Modal1 -->
    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <div class="modal-body modal-body-sub_agile">
                    <div class="main-mailposi">
                        <span class="fa fa-envelope-o" aria-hidden="true"></span>
                    </div>
                    <div class="modal_body_left modal_body_left1">
                        <h3 class="agileinfo_sign">Sign In </h3>
                        <p>
                            Sign In now, Let's start your Grocery Shopping. Don't have an account?
                            <a href="#" data-toggle="modal" data-target="#myModal2">
								Sign Up Now</a>
                        </p>
                        <form action="#" method="post">
                            <div class="styled-input agile-styled-input-top">
                                <input type="text" placeholder="User Name" name="Name" required="">
                            </div>
                            <div class="styled-input">
                                <input type="password" placeholder="Password" name="password" required="">
                            </div>
                            <input type="submit" value="Sign In">
                        </form>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- //Modal content-->
        </div>
    </div>
    <!-- //Modal1 -->
    <!-- //signin Model -->
    <!-- signup Model -->
    <!-- Modal2 -->
    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <div class="modal-body modal-body-sub_agile">
                    <div class="main-mailposi">
                        <span class="fa fa-envelope-o" aria-hidden="true"></span>
                    </div>
                    <div class="modal_body_left modal_body_left1">
                        <h3 class="agileinfo_sign">Sign Up</h3>
                        <p>
                            Come join the Grocery Shoppy! Let's set up your Account.
                        </p>
                        <form action="#" method="post">
                            <div class="styled-input agile-styled-input-top">
                                <input type="text" placeholder="Name" name="Name" required="">
                            </div>
                            <div class="styled-input">
                                <input type="email" placeholder="E-mail" name="Email" required="">
                            </div>
                            <div class="styled-input">
                                <input type="password" placeholder="Password" name="password" id="password1" required="">
                            </div>
                            <div class="styled-input">
                                <input type="password" placeholder="Confirm Password" name="Confirm Password" id="password2" required="">
                            </div>
                            <input type="submit" value="Sign Up">
                        </form>
                        <p>
                            <a href="#">By clicking register, I agree to your terms</a>
                        </p>
                    </div>
                </div>
            </div>
            <!-- //Modal content-->
        </div>
    </div>
    <!-- //Modal2 -->
    <!-- //signup Model -->
    <!-- //header-bot -->
    <!-- navigation -->
    <div class="ban-top">
        <div class="container">
            <div class="agileits-navi_search">
                <form action="#" method="post">
                    <select id="agileinfo-nav_search" name="agileinfo_search" required="">
						<option value="" selected="selected">All Categories</option>
						<option value="Kitchen">Kitchen</option>
						<option value="Household">Household</option>
						<option value="Snacks &amp; Beverages">Snacks &amp; Beverages</option>
						<option value="Personal Care">Personal Care</option>
						<option value="Gift Hampers">Gift Hampers</option>
						<option value="Fruits &amp; Vegetables">Fruits &amp; Vegetables</option>
						<option value="Baby Care">Baby Care</option>
						<option value="Soft Drinks &amp; Juices">Soft Drinks &amp; Juices</option>
						<option value="Frozen Food">Frozen Food</option>
						<option value="Bread &amp; Bakery">Bread &amp; Bakery</option>
						<option value="Sweets">Sweets</option>
					</select>
                </form>
            </div>
            <div class="top_nav_left">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav menu__list">
                                <li>
                                    <a class="nav-stylehead" href="index.html">Home
										<span class="sr-only">(current)</span>
									</a>
                                </li>
                                <li class="">
                                    <a class="nav-stylehead" href="about.html">About Us</a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle nav-stylehead" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Kitchen
										<span class="caret"></span>
									</a>
                                    <ul class="dropdown-menu multi-column columns-3">
                                        <div class="agile_inner_drop_nav_info">
                                            <div class="col-sm-4 multi-gd-img">
                                                <ul class="multi-column-dropdown">
                                                    <li>
                                                        <a href="product.html">Bakery</a>
                                                    </li>
                                                    <li>
                                                        <a href="product.html">Baking Supplies</a>
                                                    </li>
                                                    <li>
                                                        <a href="product.html">Coffee, Tea &amp; Beverages</a>
                                                    </li>
                                                    <li>
                                                        <a href="product.html">Dried Fruits, Nuts</a>
                                                    </li>
                                                    <li>
                                                        <a href="product.html">Sweets, Chocolate</a>
                                                    </li>
                                                    <li>
                                                        <a href="product.html">Spices &amp; Masalas</a>
                                                    </li>
                                                    <li>
                                                        <a href="product.html">Jams, Honey &amp; Spreads</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-4 multi-gd-img">
                                                <ul class="multi-column-dropdown">
                                                    <li>
                                                        <a href="product.html">Pickles</a>
                                                    </li>
                                                    <li>
                                                        <a href="product.html">Pasta &amp; Noodles</a>
                                                    </li>
                                                    <li>
                                                        <a href="product.html">Rice, Flour &amp; Pulses</a>
                                                    </li>
                                                    <li>
                                                        <a href="product.html">Sauces &amp; Cooking Pastes</a>
                                                    </li>
                                                    <li>
                                                        <a href="product.html">Snack Foods</a>
                                                    </li>
                                                    <li>
                                                        <a href="product.html">Oils, Vinegars</a>
                                                    </li>
                                                    <li>
                                                        <a href="product.html">Meat, Poultry &amp; Seafood</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-4 multi-gd-img">
                                                <img src="checkout_archivos/nav.png" alt="">
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle nav-stylehead" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Household
										<span class="caret"></span>
									</a>
                                    <ul class="dropdown-menu multi-column columns-3">
                                        <div class="agile_inner_drop_nav_info">
                                            <div class="col-sm-6 multi-gd-img">
                                                <ul class="multi-column-dropdown">
                                                    <li>
                                                        <a href="product2.html">Kitchen &amp; Dining</a>
                                                    </li>
                                                    <li>
                                                        <a href="product2.html">Detergents</a>
                                                    </li>
                                                    <li>
                                                        <a href="product2.html">Utensil Cleaners</a>
                                                    </li>
                                                    <li>
                                                        <a href="product2.html">Floor &amp; Other Cleaners</a>
                                                    </li>
                                                    <li>
                                                        <a href="product2.html">Disposables, Garbage Bag</a>
                                                    </li>
                                                    <li>
                                                        <a href="product2.html">Repellents &amp; Fresheners</a>
                                                    </li>
                                                    <li>
                                                        <a href="product2.html"> Dishwash</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-6 multi-gd-img">
                                                <ul class="multi-column-dropdown">
                                                    <li>
                                                        <a href="product2.html">Pet Care</a>
                                                    </li>
                                                    <li>
                                                        <a href="product2.html">Cleaning Accessories</a>
                                                    </li>
                                                    <li>
                                                        <a href="product2.html">Pooja Needs</a>
                                                    </li>
                                                    <li>
                                                        <a href="product2.html">Crackers</a>
                                                    </li>
                                                    <li>
                                                        <a href="product2.html">Festive Decoratives</a>
                                                    </li>
                                                    <li>
                                                        <a href="product2.html">Plasticware</a>
                                                    </li>
                                                    <li>
                                                        <a href="product2.html">Home Care</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </ul>
                                </li>
                                <li class="">
                                    <a class="nav-stylehead" href="faqs.html">Faqs</a>
                                </li>
                                <li class="dropdown">
                                    <a class="nav-stylehead dropdown-toggle" href="#" data-toggle="dropdown">Pages
										<b class="caret"></b>
									</a>
                                    <ul class="dropdown-menu agile_short_dropdown">
                                        <li>
                                            <a href="icons.html">Web Icons</a>
                                        </li>
                                        <li>
                                            <a href="typography.html">Typography</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="" href="contact.html">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- //navigation -->
    <!-- banner-2 -->
    <div class="page-head_agile_info_w3l">

    </div>
    <!-- //banner-2 -->
    <!-- page -->
    <div class="services-breadcrumb">
        <div class="agile_inner_breadcrumb">
            <div class="container">
                <ul class="w3_short">
                    <li>
                        <a href="index.html">Home</a>
                        <i>|</i>
                    </li>
                    <li>Checkout</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- //page -->
    <!---728x90--->

    <!-- checkout page -->
    <div class="privacy">
        <div class="container">
            <!-- tittle heading -->
            <h3 class="tittle-w3l">Checkout
                <span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
            </h3>
            <!-- //tittle heading -->
            <div class="checkout-right">
                <h4>Your shopping cart contains:
                    <span>3 Products</span>
                </h4>
                <div class="table-responsive">
                    <table class="timetable_sub">
                        <thead>
                            <tr>
                                <th>SL No.</th>
                                <th>Product</th>
                                <th>Quality</th>
                                <th>Product Name</th>

                                <th>Price</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="rem1">
                                <td class="invert">1</td>
                                <td class="invert-image">
                                    <a href="single2.html">
                                        <img src="checkout_archivos/a7.jpg" alt=" " class="img-responsive">
                                    </a>
                                </td>
                                <td class="invert">
                                    <div class="quantity">
                                        <div class="quantity-select">
                                            <div class="entry value-minus">&nbsp;</div>
                                            <div class="entry value">
                                                <span>1</span>
                                            </div>
                                            <div class="entry value-plus active">&nbsp;</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="invert">Spotzero Spin Mop</td>
                                <td class="invert">$888.00</td>
                                <td class="invert">
                                    <div class="rem">
                                        <div class="close1"> </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="rem2">
                                <td class="invert">2</td>
                                <td class="invert-image">
                                    <a href="single2.html">
                                        <img src="checkout_archivos/s6.jpg" alt=" " class="img-responsive">
                                    </a>
                                </td>
                                <td class="invert">
                                    <div class="quantity">
                                        <div class="quantity-select">
                                            <div class="entry value-minus">&nbsp;</div>
                                            <div class="entry value">
                                                <span>1</span>
                                            </div>
                                            <div class="entry value-plus active">&nbsp;</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="invert">Fair &amp; Lovely, 80 g</td>
                                <td class="invert">$121.60</td>
                                <td class="invert">
                                    <div class="rem">
                                        <div class="close2"> </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="rem3">
                                <td class="invert">3</td>
                                <td class="invert-image">
                                    <a href="single.html">
                                        <img src="checkout_archivos/s5.jpg" alt=" " class="img-responsive">
                                    </a>
                                </td>
                                <td class="invert">
                                    <div class="quantity">
                                        <div class="quantity-select">
                                            <div class="entry value-minus">&nbsp;</div>
                                            <div class="entry value">
                                                <span>1</span>
                                            </div>
                                            <div class="entry value-plus active">&nbsp;</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="invert">Sprite, 2.25L (Pack of 2)</td>
                                <td class="invert">$180.00</td>
                                <td class="invert">
                                    <div class="rem">
                                        <div class="close3"> </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="checkout-left">
                <div class="address_form_agile">
                    <h4>Add a new Details</h4>
                    <form action="payment.html" method="post" class="creditly-card-form agileinfo_form">
                        <div class="creditly-wrapper wthree, w3_agileits_wrapper">
                            <div class="information-wrapper">
                                <div class="first-row">
                                    <div class="controls">
                                        <input class="billing-address-name" type="text" name="name" placeholder="Full Name" required="">
                                    </div>
                                    <div class="w3_agileits_card_number_grids">
                                        <div class="w3_agileits_card_number_grid_left">
                                            <div class="controls">
                                                <input type="text" placeholder="Mobile Number" name="number" required="">
                                            </div>
                                        </div>
                                        <div class="w3_agileits_card_number_grid_right">
                                            <div class="controls">
                                                <input type="text" placeholder="Landmark" name="landmark" required="">
                                            </div>
                                        </div>
                                        <div class="clear"> </div>
                                    </div>
                                    <div class="controls">
                                        <input type="text" placeholder="Town/City" name="city" required="">
                                    </div>
                                    <div class="controls">
                                        <select class="option-w3ls">
											<option selected="selected">Select Address type</option>
											<option>Office</option>
											<option>Home</option>
											<option>Commercial</option>

										</select>
                                    </div>
                                </div>
                                <button class="submit check_out">Delivery to this Address</button>
                            </div>
                        </div>
                    </form>
                    <div class="checkout-right-basket">
                        <a href="payment.html">Make a Payment
							<span class="fa fa-hand-o-right" aria-hidden="true"></span>
						</a>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <!-- //checkout page -->
    <!---728x90--->
    <!-- newsletter -->
    <div class="footer-top">
        <div class="container-fluid">
            <div class="col-xs-8 agile-leftmk">
                <h2>Get your Groceries delivered from local stores</h2>
                <p>Free Delivery on your first order!</p>
                <form action="#" method="post">
                    <input type="email" placeholder="E-mail" name="email" required="">
                    <input type="submit" value="Subscribe">
                </form>
                <div class="newsform-w3l">
                    <span class="fa fa-envelope-o" aria-hidden="true"></span>
                </div>
            </div>
            <div class="col-xs-4 w3l-rightmk">
                <img src="checkout_archivos/tab3.png" alt=" ">
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- //newsletter -->
    <!---728x90--->
    <!-- footer -->
    <footer>
        <div class="container">
            <!-- footer first section -->
            <p class="footer-main">
                <span>"Grocery Shoppy"</span> Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.Sed ut perspiciatis unde omnis iste natus error sit
                voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
            <!-- //footer first section -->
            <!-- footer second section -->
            <div class="w3l-grids-footer">
                <div class="col-xs-4 offer-footer">
                    <div class="col-xs-4 icon-fot">
                        <span class="fa fa-map-marker" aria-hidden="true"></span>
                    </div>
                    <div class="col-xs-8 text-form-footer">
                        <h3>Track Your Order</h3>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-xs-4 offer-footer">
                    <div class="col-xs-4 icon-fot">
                        <span class="fa fa-refresh" aria-hidden="true"></span>
                    </div>
                    <div class="col-xs-8 text-form-footer">
                        <h3>Free &amp; Easy Returns</h3>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-xs-4 offer-footer">
                    <div class="col-xs-4 icon-fot">
                        <span class="fa fa-times" aria-hidden="true"></span>
                    </div>
                    <div class="col-xs-8 text-form-footer">
                        <h3>Online cancellation </h3>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
            <!-- //footer second section -->
            <!-- footer third section -->
            <div class="footer-info w3-agileits-info">
                <!-- footer categories -->
                <div class="col-sm-5 address-right">
                    <div class="col-xs-6 footer-grids">
                        <h3>Categories</h3>
                        <ul>
                            <li>
                                <a href="product.html">Grocery</a>
                            </li>
                            <li>
                                <a href="product.html">Fruits</a>
                            </li>
                            <li>
                                <a href="product.html">Soft Drinks</a>
                            </li>
                            <li>
                                <a href="product2.html">Dishwashers</a>
                            </li>
                            <li>
                                <a href="product.html">Biscuits &amp; Cookies</a>
                            </li>
                            <li>
                                <a href="product2.html">Baby Diapers</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xs-6 footer-grids agile-secomk">
                        <ul>
                            <li>
                                <a href="product.html">Snacks &amp; Beverages</a>
                            </li>
                            <li>
                                <a href="product.html">Bread &amp; Bakery</a>
                            </li>
                            <li>
                                <a href="product.html">Sweets</a>
                            </li>
                            <li>
                                <a href="product.html">Chocolates &amp; Biscuits</a>
                            </li>
                            <li>
                                <a href="product2.html">Personal Care</a>
                            </li>
                            <li>
                                <a href="product.html">Dried Fruits &amp; Nuts</a>
                            </li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- //footer categories -->
                <!-- quick links -->
                <div class="col-sm-5 address-right">
                    <div class="col-xs-6 footer-grids">
                        <h3>Quick Links</h3>
                        <ul>
                            <li>
                                <a href="about.html">About Us</a>
                            </li>
                            <li>
                                <a href="contact.html">Contact Us</a>
                            </li>
                            <li>
                                <a href="help.html">Help</a>
                            </li>
                            <li>
                                <a href="faqs.html">Faqs</a>
                            </li>
                            <li>
                                <a href="terms.html">Terms of use</a>
                            </li>
                            <li>
                                <a href="privacy.html">Privacy Policy</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xs-6 footer-grids">
                        <h3>Get in Touch</h3>
                        <ul>
                            <li>
                                <i class="fa fa-map-marker"></i> 123 Sebastian, USA.</li>
                            <li>
                                <i class="fa fa-mobile"></i> 333 222 3333 </li>
                            <li>
                                <i class="fa fa-phone"></i> +222 11 4444 </li>
                            <li>
                                <i class="fa fa-envelope-o"></i>
                                <a href="mailto:example@mail.com"> mail@example.com</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- //quick links -->
                <!-- social icons -->
                <div class="col-sm-2 footer-grids  w3l-socialmk">
                    <h3>Follow Us on</h3>
                    <div class="social">
                        <ul>
                            <li>
                                <a class="icon fb" href="#">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a class="icon tw" href="#">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a class="icon gp" href="#">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="agileits_app-devices">
                        <h5>Download the App</h5>
                        <a href="#">
                            <img src="checkout_archivos/1.png" alt="">
                        </a>
                        <a href="#">
                            <img src="checkout_archivos/2.png" alt="">
                        </a>
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <!-- //social icons -->
                <div class="clearfix"></div>
            </div>
            <!-- //footer third section -->
            <!-- footer fourth section (text) -->
            <div class="agile-sometext">
                <div class="sub-some">
                    <h5>Online Grocery Shopping</h5>
                    <p>Order online. All your favourite products from the low price online supermarket for grocery home delivery in Delhi, Gurgaon, Bengaluru, Mumbai and other cities in India. Lowest prices guaranteed on Patanjali, Aashirvaad, Pampers, Maggi,
                        Saffola, Huggies, Fortune, Nestle, Amul, MamyPoko Pants, Surf Excel, Ariel, Vim, Haldiram's and others.</p>
                </div>
                <div class="sub-some">
                    <h5>Shop online with the best deals &amp; offers</h5>
                    <p>Now Get Upto 40% Off On Everyday Essential Products Shown On The Offer Page. The range includes Grocery, Personal Care, Baby Care, Pet Supplies, Healthcare and Other Daily Need Products. Discount May Vary From Product To Product.</p>
                </div>
                <!-- brands -->
                <div class="sub-some">
                    <h5>Popular Brands</h5>
                    <ul>
                        <li>
                            <a href="product.html">Aashirvaad</a>
                        </li>
                        <li>
                            <a href="product.html">Amul</a>
                        </li>
                        <li>
                            <a href="product.html">Bingo</a>
                        </li>
                        <li>
                            <a href="product.html">Boost</a>
                        </li>
                        <li>
                            <a href="product.html">Durex</a>
                        </li>
                        <li>
                            <a href="product.html"> Maggi</a>
                        </li>
                        <li>
                            <a href="product.html">Glucon-D</a>
                        </li>
                        <li>
                            <a href="product.html">Horlicks</a>
                        </li>
                        <li>
                            <a href="product2.html">Head &amp; Shoulders</a>
                        </li>
                        <li>
                            <a href="product2.html">Dove</a>
                        </li>
                        <li>
                            <a href="product2.html">Dettol</a>
                        </li>
                        <li>
                            <a href="product2.html">Dabur</a>
                        </li>
                        <li>
                            <a href="product2.html">Colgate</a>
                        </li>
                        <li>
                            <a href="product.html">Coca-Cola</a>
                        </li>
                        <li>
                            <a href="product2.html">Closeup</a>
                        </li>
                        <li>
                            <a href="product2.html"> Cinthol</a>
                        </li>
                        <li>
                            <a href="product.html">Cadbury</a>
                        </li>
                        <li>
                            <a href="product.html">Bru</a>
                        </li>
                        <li>
                            <a href="product.html">Bournvita</a>
                        </li>
                        <li>
                            <a href="product.html">Tang</a>
                        </li>
                        <li>
                            <a href="product.html">Pears</a>
                        </li>
                        <li>
                            <a href="product.html">Oreo</a>
                        </li>
                        <li>
                            <a href="product.html"> Taj Mahal</a>
                        </li>
                        <li>
                            <a href="product.html">Sprite</a>
                        </li>
                        <li>
                            <a href="product.html">Thums Up</a>
                        </li>
                        <li>
                            <a href="product2.html">Fair &amp; Lovely</a>
                        </li>
                        <li>
                            <a href="product2.html">Lakme</a>
                        </li>
                        <li>
                            <a href="product.html">Tata</a>
                        </li>
                        <li>
                            <a href="product2.html">Sunfeast</a>
                        </li>
                        <li>
                            <a href="product2.html">Sunsilk</a>
                        </li>
                        <li>
                            <a href="product.html">Patanjali</a>
                        </li>
                        <li>
                            <a href="product.html">MTR</a>
                        </li>
                        <li>
                            <a href="product.html">Kissan</a>
                        </li>
                        <li>
                            <a href="product2.html"> Lipton</a>
                        </li>
                    </ul>
                </div>
                <!-- //brands -->
                <!-- payment -->
                <div class="sub-some child-momu">
                    <h5>Payment Method</h5>
                    <ul>
                        <li>
                            <img src="checkout_archivos/pay2.png" alt="">
                        </li>
                        <li>
                            <img src="checkout_archivos/pay5.png" alt="">
                        </li>
                        <li>
                            <img src="checkout_archivos/pay1.png" alt="">
                        </li>
                        <li>
                            <img src="checkout_archivos/pay4.png" alt="">
                        </li>
                        <li>
                            <img src="checkout_archivos/pay6.png" alt="">
                        </li>
                        <li>
                            <img src="checkout_archivos/pay3.png" alt="">
                        </li>
                        <li>
                            <img src="checkout_archivos/pay7.png" alt="">
                        </li>
                        <li>
                            <img src="checkout_archivos/pay8.png" alt="">
                        </li>
                        <li>
                            <img src="checkout_archivos/pay9.png" alt="">
                        </li>
                    </ul>
                </div>
                <!-- //payment -->
            </div>
            <!-- //footer fourth section (text) -->
        </div>
    </footer>
    <!-- //footer -->


    <!-- js-files -->
    <!-- jquery -->
    <script src="checkout_archivos/jquery-2.js"></script>
    <!-- //jquery -->

    <!-- popup modal (for signin & signup)-->
    <script src="checkout_archivos/jquery.js"></script>
    <script>
        $(document).ready(function() {
            $('.popup-with-zoom-anim').magnificPopup({
                type: 'inline',
                fixedContentPos: false,
                fixedBgPos: true,
                overflowY: 'auto',
                closeBtnInside: true,
                preloader: false,
                midClick: true,
                removalDelay: 300,
                mainClass: 'my-mfp-zoom-in'
            });

        });
    </script>
    <!-- Large modal -->
    <!-- <script>
		$('#').modal('show');
	</script> -->
    <!-- //popup modal (for signin & signup)-->

    <!-- cart-js -->
    <script src="checkout_archivos/minicart.js"></script>
    <script>
        paypalm.minicartk.render(); //use only unique class names other than paypal1.minicart1.Also Replace same class name in css and minicart.min.js

        paypalm.minicartk.cart.on('checkout', function(evt) {
            var items = this.items(),
                len = items.length,
                total = 0,
                i;

            // Count the number of each item in the cart
            for (i = 0; i < len; i++) {
                total += items[i].get('quantity');
            }

            if (total < 3) {
                alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
                evt.preventDefault();
            }
        });
    </script>
    <div id="PPminicartk">
        <form method="post" class="lalal" action="checkout.html" target=""> <button type="button" class="minicartk-closer">×</button>
            <ul>
                <li class="minicartk-item">
                    <div class="minicartk-details-name"> <a class="minicartk-name" href="index.html">Cadbury Choclairs, 655.5g</a>
                        <ul class="minicartk-attributes">
                            <li> Discount: $4.00 <input type="hidden" name="discount_amount_1" value="4"> </li>
                        </ul>
                    </div>
                    <div class="minicartk-details-quantity"> <input class="minicartk-quantity" data-minicartk-idx="0" name="quantity_1" type="text" pattern="[0-9]*" value="4" autocomplete="off"> </div>
                    <div class="minicartk-details-remove"> <button type="button" class="minicartk-remove" data-minicartk-idx="0">×</button> </div>
                    <div class="minicartk-details-price"> <span class="minicartk-price">$636.00</span> </div> <input type="hidden" name="item_name_1" value="Cadbury Choclairs, 655.5g"> <input type="hidden" name="amount_1" value="160"> <input type="hidden" name="shipping_1" value="undefined">                    <input type="hidden" name="shipping2_1" value="undefined"> </li>
                <li class="minicartk-item">
                    <div class="minicartk-details-name"> <a class="minicartk-name" href="index.html">Almonds, 100g</a>
                        <ul class="minicartk-attributes">
                            <li> Discount: $1.00 <input type="hidden" name="discount_amount_2" value="1"> </li>
                        </ul>
                    </div>
                    <div class="minicartk-details-quantity"> <input class="minicartk-quantity" data-minicartk-idx="1" name="quantity_2" type="text" pattern="[0-9]*" value="1" autocomplete="off"> </div>
                    <div class="minicartk-details-remove"> <button type="button" class="minicartk-remove" data-minicartk-idx="1">×</button> </div>
                    <div class="minicartk-details-price"> <span class="minicartk-price">$148.00</span> </div> <input type="hidden" name="item_name_2" value="Almonds, 100g"> <input type="hidden" name="amount_2" value="149"> <input type="hidden" name="shipping_2" value="undefined"> <input type="hidden"
                        name="shipping2_2" value="undefined"> </li>
            </ul>
            <div class="minicartk-footer">
                <div class="minicartk-subtotal"> Subtotal: $784.00 USD </div> <button class="minicartk-submit" type="submit" data-minicartk-alt="undefined">Check Out with <img src="checkout_archivos/paypal_65x18.png" alt="paypalm" width="65" height="18"></button> </div> <input type="hidden"
                name="cmd" value="_cart"> <input type="hidden" name="upload" value="1"> <input type="hidden" name="bn" value="minicartk_AddToCart_WPS_US"> <input type="hidden" name="business" value=" "> <input type="hidden" name="currency_code" value="USD">            <input type="hidden" name="return" value=" "> <input type="hidden" name="cancel_return" value=" "> </form>
    </div>
    <!-- //cart-js -->

    <!--quantity-->
    <script>
        $('.value-plus').on('click', function() {
            var divUpd = $(this).parent().find('.value'),
                newVal = parseInt(divUpd.text(), 10) + 1;
            divUpd.text(newVal);
        });

        $('.value-minus').on('click', function() {
            var divUpd = $(this).parent().find('.value'),
                newVal = parseInt(divUpd.text(), 10) - 1;
            if (newVal >= 1) divUpd.text(newVal);
        });
    </script>
    <!--quantity-->
    <script>
        $(document).ready(function(c) {
            $('.close1').on('click', function(c) {
                $('.rem1').fadeOut('slow', function(c) {
                    $('.rem1').remove();
                });
            });
        });
    </script>
    <script>
        $(document).ready(function(c) {
            $('.close2').on('click', function(c) {
                $('.rem2').fadeOut('slow', function(c) {
                    $('.rem2').remove();
                });
            });
        });
    </script>
    <script>
        $(document).ready(function(c) {
            $('.close3').on('click', function(c) {
                $('.rem3').fadeOut('slow', function(c) {
                    $('.rem3').remove();
                });
            });
        });
    </script>
    <!--//quantity-->

    <!-- password-script -->
    <script>
        window.onload = function() {
            document.getElementById("password1").onchange = validatePassword;
            document.getElementById("password2").onchange = validatePassword;
        }

        function validatePassword() {
            var pass2 = document.getElementById("password2").value;
            var pass1 = document.getElementById("password1").value;
            if (pass1 != pass2)
                document.getElementById("password2").setCustomValidity("Passwords Don't Match");
            else
                document.getElementById("password2").setCustomValidity('');
            //empty string means no validation error
        }
    </script>
    <!-- //password-script -->

    <!-- smoothscroll -->
    <script src="checkout_archivos/SmoothScroll.js"></script>
    <!-- //smoothscroll -->

    <!-- start-smooth-scrolling -->
    <script src="checkout_archivos/move-top.js"></script>
    <script src="checkout_archivos/easing.js"></script>
    <script>
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();

                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });
    </script>
    <!-- //end-smooth-scrolling -->

    <!-- smooth-scrolling-of-move-up -->
    <script>
        $(document).ready(function() {
            /*
            var defaults = {
            	containerID: 'toTop', // fading element id
            	containerHoverID: 'toTopHover', // fading element hover id
            	scrollSpeed: 1200,
            	easingType: 'linear' 
            };
            */
            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });
    </script>
    <!-- //smooth-scrolling-of-move-up -->

    <!-- for bootstrap working -->
    <script src="checkout_archivos/bootstrap.js"></script>
    <!-- //for bootstrap working -->
    <!-- //js-files -->



    <div id="v-w3layouts-0" style="display: block; width: 100%; margin-left: 0px;">
        <vdo id="parentDiv0">
            <vdo id="unitDivWrapper-0" style="height: 450px;">
                <div id="_vdo_ads_player_ai_3944" style="display: block; width: 100%; margin-left: 0px;" class="vdo_content">
                    <video-js id="vdo_ai_6874530" muted="true" autoplay="true" playsinline="playsinline" webkit-playsinline="webkit-playsinline" style="transition: none!important; border-radius: 0%!important;" class="vdo-js vjs-default-skin vdo-vjs-custom-skin vdo_ai_6874530-dimensions vjs-controls-enabled vjs-workinghover vjs-v7 vdo-autoplay-disabled vjs-has-started vjs-paused vjs-user-inactive"
                        poster="https://s.vdo.ai/uploads/thumbnails/16394881987561b89ac68dd3d.png" tabindex="-1" role="region" aria-label="Video Player" lang="zxx"><video tabindex="-1" poster="https://s.vdo.ai/uploads/thumbnails/16394881987561b89ac68dd3d.png" class="vjs-tech" style="transition: none!important; border-radius: 0%!important;" webkit-playsinline="true" playsinline="playsinline" autoplay="autoplay"
                            muted="muted" id="vdo_ai_6874530_html5_api" preload="true" src="blob:https://p.w3layouts.com/3f678edc-c92d-4c84-b016-5146fb3a6edd"><source src="checkout_archivos/16394881987561b89ac68dd3d.m3u8" type="application/x-mpegURL"></video>
                        <div class="vjs-poster" tabindex="-1" aria-disabled="false" style="background-image: url(&quot;https://s.vdo.ai/uploads/thumbnails/16394881987561b89ac68dd3d.png&quot;);"></div>
                        <div class="vjs-text-track-display" aria-live="off" aria-atomic="true">
                            <div style="position: absolute; inset: 0px; margin: 1.5%;"></div>
                        </div>
                        <div class="vjs-loading-spinner" dir="ltr"><span class="vjs-control-text">Video Player is loading.</span></div><button class="vjs-big-play-button" type="button" title="Play Video" aria-disabled="false"><span aria-hidden="true" class="vjs-icon-placeholder"></span><span class="vjs-control-text" aria-live="polite">Play Video</span></button>
                        <div class="vjs-control-bar" dir="ltr"><button class="vjs-play-control vjs-control vjs-button vjs-paused" type="button" title="Play" aria-disabled="false"><span aria-hidden="true" class="vjs-icon-placeholder"></span><span class="vjs-control-text" aria-live="polite">Play</span></button>
                            <div class="vjs-volume-panel vjs-control vjs-volume-panel-vertical"><button class="vjs-mute-control vjs-control vjs-button vjs-vol-0" type="button" title="Unmute" aria-disabled="false"><span aria-hidden="true" class="vjs-icon-placeholder"></span><span class="vjs-control-text" aria-live="polite">Unmute</span></button>
                                <div class="vjs-volume-control vjs-control vjs-volume-vertical">
                                    <div tabindex="0" class="vjs-volume-bar vjs-slider-bar vjs-slider vjs-slider-vertical" role="slider" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" aria-label="Volume Level" aria-live="polite" aria-valuetext="0%">
                                        <div class="vjs-mouse-display">
                                            <div class="vjs-volume-tooltip" aria-hidden="true"></div>
                                        </div>
                                        <div class="vjs-volume-level" style="height: 0%;"><span class="vjs-control-text"></span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="vjs-current-time vjs-time-control vjs-control"><span class="vjs-control-text" role="presentation">Current Time&nbsp;</span><span class="vjs-current-time-display" aria-live="off" role="presentation">0:00</span></div>
                            <div class="vjs-time-control vjs-time-divider" aria-hidden="true">
                                <div><span>/</span></div>
                            </div>
                            <div class="vjs-duration vjs-time-control vjs-control"><span class="vjs-control-text" role="presentation">Duration&nbsp;</span><span class="vjs-duration-display" aria-live="off" role="presentation">50:01</span></div>
                            <div class="vjs-progress-control vjs-control">
                                <div tabindex="0" class="vjs-progress-holder vjs-slider vjs-slider-horizontal" role="slider" aria-valuenow="0.00" aria-valuemin="0" aria-valuemax="100" aria-label="Progress Bar" aria-valuetext="00:00 of 50:01">
                                    <div class="vjs-load-progress" style="width: 1.02%;"><span class="vjs-control-text"><span>Loaded</span>: <span class="vjs-control-text-loaded-percentage">1.02%</span></span>
                                        <div data-start="0" data-end="30.762666" style="left: 0%; width: 100%;"></div>
                                    </div>
                                    <div class="vjs-mouse-display">
                                        <div class="vjs-time-tooltip" aria-hidden="true"></div>
                                    </div>
                                    <div class="vjs-play-progress vjs-slider-bar" aria-hidden="true" style="width: 0%;">
                                        <div class="vjs-time-tooltip" aria-hidden="true" style="right: -35px;">00:00</div>
                                    </div>
                                </div>
                            </div>
                            <div class="vjs-live-control vjs-control vjs-hidden">
                                <div class="vjs-live-display" aria-live="off"><span class="vjs-control-text">Stream Type&nbsp;</span>LIVE</div>
                            </div><button class="vjs-seek-to-live-control vjs-control" type="button" title="Seek to live, currently behind live" aria-disabled="false"><span aria-hidden="true" class="vjs-icon-placeholder"></span><span class="vjs-control-text" aria-live="polite">Seek to live, currently behind live</span><span class="vjs-seek-to-live-text" aria-hidden="true">LIVE</span></button>
                            <div class="vjs-remaining-time vjs-time-control vjs-control"><span class="vjs-control-text" role="presentation">Remaining Time&nbsp;</span><span aria-hidden="true">-</span><span class="vjs-remaining-time-display" aria-live="off" role="presentation">50:01</span></div>
                            <div class="vjs-custom-control-spacer vjs-spacer ">&nbsp;</div>
                            <div class="vjs-playback-rate vjs-menu-button vjs-menu-button-popup vjs-control vjs-button vjs-hidden">
                                <div class="vjs-playback-rate-value" id="vjs-playback-rate-value-label-vdo_ai_6874530_component_1091">1x</div><button class="vjs-playback-rate vjs-menu-button vjs-menu-button-popup vjs-button" type="button" aria-disabled="false" title="Playback Rate" aria-haspopup="true" aria-expanded="false" aria-describedby="vjs-playback-rate-value-label-vdo_ai_6874530_component_1091"><span aria-hidden="true" class="vjs-icon-placeholder"></span><span class="vjs-control-text" aria-live="polite">Playback Rate</span></button>
                                <div class="vjs-menu">
                                    <ul class="vjs-menu-content" role="menu"></ul>
                                </div>
                            </div>
                            <div class="vjs-chapters-button vjs-menu-button vjs-menu-button-popup vjs-control vjs-button vjs-hidden"><button class="vjs-chapters-button vjs-menu-button vjs-menu-button-popup vjs-button" type="button" aria-disabled="false" title="Chapters" aria-haspopup="true" aria-expanded="false"><span aria-hidden="true" class="vjs-icon-placeholder"></span><span class="vjs-control-text" aria-live="polite">Chapters</span></button>
                                <div class="vjs-menu">
                                    <ul class="vjs-menu-content" role="menu">
                                        <li class="vjs-menu-title" tabindex="-1">Chapters</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="vjs-descriptions-button vjs-menu-button vjs-menu-button-popup vjs-control vjs-button vjs-hidden"><button class="vjs-descriptions-button vjs-menu-button vjs-menu-button-popup vjs-button" type="button" aria-disabled="false" title="Descriptions" aria-haspopup="true" aria-expanded="false"><span aria-hidden="true" class="vjs-icon-placeholder"></span><span class="vjs-control-text" aria-live="polite">Descriptions</span></button>
                                <div class="vjs-menu">
                                    <ul class="vjs-menu-content" role="menu">
                                        <li class="vjs-menu-item vjs-selected" tabindex="-1" role="menuitemradio" aria-disabled="false" aria-checked="true"><span class="vjs-menu-item-text">descriptions off</span><span class="vjs-control-text" aria-live="polite">, selected</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="vjs-subs-caps-button vjs-menu-button vjs-menu-button-popup vjs-control vjs-button vjs-hidden"><button class="vjs-subs-caps-button vjs-menu-button vjs-menu-button-popup vjs-button" type="button" aria-disabled="false" title="Subtitles" aria-haspopup="true" aria-expanded="false"><span aria-hidden="true" class="vjs-icon-placeholder"></span><span class="vjs-control-text" aria-live="polite">Subtitles</span></button>
                                <div class="vjs-menu">
                                    <ul class="vjs-menu-content" role="menu">
                                        <li class="vjs-menu-item vjs-texttrack-settings" tabindex="-1" role="menuitem" aria-disabled="false"><span class="vjs-menu-item-text">subtitles settings</span><span class="vjs-control-text" aria-live="polite">, opens subtitles settings dialog</span></li>
                                        <li class="vjs-menu-item vjs-selected" tabindex="-1" role="menuitemradio" aria-disabled="false" aria-checked="true"><span class="vjs-menu-item-text">subtitles off</span><span class="vjs-control-text" aria-live="polite">, selected</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="vjs-audio-button vjs-menu-button vjs-menu-button-popup vjs-control vjs-button vjs-hidden"><button class="vjs-audio-button vjs-menu-button vjs-menu-button-popup vjs-button" type="button" aria-disabled="false" title="Audio Track" aria-haspopup="true" aria-expanded="false"><span aria-hidden="true" class="vjs-icon-placeholder"></span><span class="vjs-control-text" aria-live="polite">Audio Track</span></button>
                                <div class="vjs-menu">
                                    <ul class="vjs-menu-content" role="menu">
                                        <li class="vjs-menu-item vjs-selected vjs-main-menu-item" tabindex="-1" role="menuitemradio" aria-disabled="false" aria-checked="true"><span class="vjs-menu-item-text">default</span><span class="vjs-control-text" aria-live="polite">, selected</span></li>
                                    </ul>
                                </div>
                            </div><button class="vjs-fullscreen-control vjs-control vjs-button" type="button" title="Fullscreen" aria-disabled="false"><span aria-hidden="true" class="vjs-icon-placeholder"></span><span class="vjs-control-text" aria-live="polite">Fullscreen</span></button></div>
                        <div class="vjs-error-display vjs-modal-dialog vjs-hidden " tabindex="-1" aria-describedby="vdo_ai_6874530_component_1292_description" aria-hidden="true" aria-label="Modal Window" role="dialog">
                            <p class="vjs-modal-dialog-description vjs-control-text" id="vdo_ai_6874530_component_1292_description">This is a modal window.</p>
                            <div class="vjs-modal-dialog-content" role="document"></div>
                        </div>
                        <div class="vjs-modal-dialog vjs-hidden  vjs-text-track-settings" tabindex="-1" aria-describedby="vdo_ai_6874530_component_1298_description" aria-hidden="true" aria-label="Caption Settings Dialog" role="dialog">
                            <p class="vjs-modal-dialog-description vjs-control-text" id="vdo_ai_6874530_component_1298_description">Beginning of dialog window. Escape will cancel and close the window.</p>
                            <div class="vjs-modal-dialog-content" role="document">
                                <div class="vjs-track-settings-colors">
                                    <fieldset class="vjs-fg-color vjs-track-setting">
                                        <legend id="captions-text-legend-vdo_ai_6874530_component_1298">Text</legend><label id="captions-foreground-color-vdo_ai_6874530_component_1298" class="vjs-label">Color</label><select aria-labelledby="captions-text-legend-vdo_ai_6874530_component_1298 captions-foreground-color-vdo_ai_6874530_component_1298"><option id="captions-foreground-color-vdo_ai_6874530_component_1298-White" value="#FFF" aria-labelledby="captions-text-legend-vdo_ai_6874530_component_1298 captions-foreground-color-vdo_ai_6874530_component_1298 captions-foreground-color-vdo_ai_6874530_component_1298-White" selected="selected">White</option><option id="captions-foreground-color-vdo_ai_6874530_component_1298-Black" value="#000" aria-labelledby="captions-text-legend-vdo_ai_6874530_component_1298 captions-foreground-color-vdo_ai_6874530_component_1298 captions-foreground-color-vdo_ai_6874530_component_1298-Black">Black</option><option id="captions-foreground-color-vdo_ai_6874530_component_1298-Red" value="#F00" aria-labelledby="captions-text-legend-vdo_ai_6874530_component_1298 captions-foreground-color-vdo_ai_6874530_component_1298 captions-foreground-color-vdo_ai_6874530_component_1298-Red">Red</option><option id="captions-foreground-color-vdo_ai_6874530_component_1298-Green" value="#0F0" aria-labelledby="captions-text-legend-vdo_ai_6874530_component_1298 captions-foreground-color-vdo_ai_6874530_component_1298 captions-foreground-color-vdo_ai_6874530_component_1298-Green">Green</option><option id="captions-foreground-color-vdo_ai_6874530_component_1298-Blue" value="#00F" aria-labelledby="captions-text-legend-vdo_ai_6874530_component_1298 captions-foreground-color-vdo_ai_6874530_component_1298 captions-foreground-color-vdo_ai_6874530_component_1298-Blue">Blue</option><option id="captions-foreground-color-vdo_ai_6874530_component_1298-Yellow" value="#FF0" aria-labelledby="captions-text-legend-vdo_ai_6874530_component_1298 captions-foreground-color-vdo_ai_6874530_component_1298 captions-foreground-color-vdo_ai_6874530_component_1298-Yellow">Yellow</option><option id="captions-foreground-color-vdo_ai_6874530_component_1298-Magenta" value="#F0F" aria-labelledby="captions-text-legend-vdo_ai_6874530_component_1298 captions-foreground-color-vdo_ai_6874530_component_1298 captions-foreground-color-vdo_ai_6874530_component_1298-Magenta">Magenta</option><option id="captions-foreground-color-vdo_ai_6874530_component_1298-Cyan" value="#0FF" aria-labelledby="captions-text-legend-vdo_ai_6874530_component_1298 captions-foreground-color-vdo_ai_6874530_component_1298 captions-foreground-color-vdo_ai_6874530_component_1298-Cyan">Cyan</option></select>
                                        <span class="vjs-text-opacity vjs-opacity"><label id="captions-foreground-opacity-vdo_ai_6874530_component_1298" class="vjs-label">Transparency</label><select aria-labelledby="captions-text-legend-vdo_ai_6874530_component_1298 captions-foreground-opacity-vdo_ai_6874530_component_1298"><option id="captions-foreground-opacity-vdo_ai_6874530_component_1298-Opaque" value="1" aria-labelledby="captions-text-legend-vdo_ai_6874530_component_1298 captions-foreground-opacity-vdo_ai_6874530_component_1298 captions-foreground-opacity-vdo_ai_6874530_component_1298-Opaque" selected="selected">Opaque</option><option id="captions-foreground-opacity-vdo_ai_6874530_component_1298-SemiTransparent" value="0.5" aria-labelledby="captions-text-legend-vdo_ai_6874530_component_1298 captions-foreground-opacity-vdo_ai_6874530_component_1298 captions-foreground-opacity-vdo_ai_6874530_component_1298-SemiTransparent">Semi-Transparent</option></select></span>
                                    </fieldset>
                                    <fieldset class="vjs-bg-color vjs-track-setting">
                                        <legend id="captions-background-vdo_ai_6874530_component_1298">Background</legend><label id="captions-background-color-vdo_ai_6874530_component_1298" class="vjs-label">Color</label><select aria-labelledby="captions-background-vdo_ai_6874530_component_1298 captions-background-color-vdo_ai_6874530_component_1298"><option id="captions-background-color-vdo_ai_6874530_component_1298-Black" value="#000" aria-labelledby="captions-background-vdo_ai_6874530_component_1298 captions-background-color-vdo_ai_6874530_component_1298 captions-background-color-vdo_ai_6874530_component_1298-Black" selected="selected">Black</option><option id="captions-background-color-vdo_ai_6874530_component_1298-White" value="#FFF" aria-labelledby="captions-background-vdo_ai_6874530_component_1298 captions-background-color-vdo_ai_6874530_component_1298 captions-background-color-vdo_ai_6874530_component_1298-White">White</option><option id="captions-background-color-vdo_ai_6874530_component_1298-Red" value="#F00" aria-labelledby="captions-background-vdo_ai_6874530_component_1298 captions-background-color-vdo_ai_6874530_component_1298 captions-background-color-vdo_ai_6874530_component_1298-Red">Red</option><option id="captions-background-color-vdo_ai_6874530_component_1298-Green" value="#0F0" aria-labelledby="captions-background-vdo_ai_6874530_component_1298 captions-background-color-vdo_ai_6874530_component_1298 captions-background-color-vdo_ai_6874530_component_1298-Green">Green</option><option id="captions-background-color-vdo_ai_6874530_component_1298-Blue" value="#00F" aria-labelledby="captions-background-vdo_ai_6874530_component_1298 captions-background-color-vdo_ai_6874530_component_1298 captions-background-color-vdo_ai_6874530_component_1298-Blue">Blue</option><option id="captions-background-color-vdo_ai_6874530_component_1298-Yellow" value="#FF0" aria-labelledby="captions-background-vdo_ai_6874530_component_1298 captions-background-color-vdo_ai_6874530_component_1298 captions-background-color-vdo_ai_6874530_component_1298-Yellow">Yellow</option><option id="captions-background-color-vdo_ai_6874530_component_1298-Magenta" value="#F0F" aria-labelledby="captions-background-vdo_ai_6874530_component_1298 captions-background-color-vdo_ai_6874530_component_1298 captions-background-color-vdo_ai_6874530_component_1298-Magenta">Magenta</option><option id="captions-background-color-vdo_ai_6874530_component_1298-Cyan" value="#0FF" aria-labelledby="captions-background-vdo_ai_6874530_component_1298 captions-background-color-vdo_ai_6874530_component_1298 captions-background-color-vdo_ai_6874530_component_1298-Cyan">Cyan</option></select>
                                        <span class="vjs-bg-opacity vjs-opacity"><label id="captions-background-opacity-vdo_ai_6874530_component_1298" class="vjs-label">Transparency</label><select aria-labelledby="captions-background-vdo_ai_6874530_component_1298 captions-background-opacity-vdo_ai_6874530_component_1298"><option id="captions-background-opacity-vdo_ai_6874530_component_1298-Opaque" value="1" aria-labelledby="captions-background-vdo_ai_6874530_component_1298 captions-background-opacity-vdo_ai_6874530_component_1298 captions-background-opacity-vdo_ai_6874530_component_1298-Opaque" selected="selected">Opaque</option><option id="captions-background-opacity-vdo_ai_6874530_component_1298-SemiTransparent" value="0.5" aria-labelledby="captions-background-vdo_ai_6874530_component_1298 captions-background-opacity-vdo_ai_6874530_component_1298 captions-background-opacity-vdo_ai_6874530_component_1298-SemiTransparent">Semi-Transparent</option><option id="captions-background-opacity-vdo_ai_6874530_component_1298-Transparent" value="0" aria-labelledby="captions-background-vdo_ai_6874530_component_1298 captions-background-opacity-vdo_ai_6874530_component_1298 captions-background-opacity-vdo_ai_6874530_component_1298-Transparent">Transparent</option></select></span>
                                    </fieldset>
                                    <fieldset class="vjs-window-color vjs-track-setting">
                                        <legend id="captions-window-vdo_ai_6874530_component_1298">Window</legend><label id="captions-window-color-vdo_ai_6874530_component_1298" class="vjs-label">Color</label><select aria-labelledby="captions-window-vdo_ai_6874530_component_1298 captions-window-color-vdo_ai_6874530_component_1298"><option id="captions-window-color-vdo_ai_6874530_component_1298-Black" value="#000" aria-labelledby="captions-window-vdo_ai_6874530_component_1298 captions-window-color-vdo_ai_6874530_component_1298 captions-window-color-vdo_ai_6874530_component_1298-Black" selected="selected">Black</option><option id="captions-window-color-vdo_ai_6874530_component_1298-White" value="#FFF" aria-labelledby="captions-window-vdo_ai_6874530_component_1298 captions-window-color-vdo_ai_6874530_component_1298 captions-window-color-vdo_ai_6874530_component_1298-White">White</option><option id="captions-window-color-vdo_ai_6874530_component_1298-Red" value="#F00" aria-labelledby="captions-window-vdo_ai_6874530_component_1298 captions-window-color-vdo_ai_6874530_component_1298 captions-window-color-vdo_ai_6874530_component_1298-Red">Red</option><option id="captions-window-color-vdo_ai_6874530_component_1298-Green" value="#0F0" aria-labelledby="captions-window-vdo_ai_6874530_component_1298 captions-window-color-vdo_ai_6874530_component_1298 captions-window-color-vdo_ai_6874530_component_1298-Green">Green</option><option id="captions-window-color-vdo_ai_6874530_component_1298-Blue" value="#00F" aria-labelledby="captions-window-vdo_ai_6874530_component_1298 captions-window-color-vdo_ai_6874530_component_1298 captions-window-color-vdo_ai_6874530_component_1298-Blue">Blue</option><option id="captions-window-color-vdo_ai_6874530_component_1298-Yellow" value="#FF0" aria-labelledby="captions-window-vdo_ai_6874530_component_1298 captions-window-color-vdo_ai_6874530_component_1298 captions-window-color-vdo_ai_6874530_component_1298-Yellow">Yellow</option><option id="captions-window-color-vdo_ai_6874530_component_1298-Magenta" value="#F0F" aria-labelledby="captions-window-vdo_ai_6874530_component_1298 captions-window-color-vdo_ai_6874530_component_1298 captions-window-color-vdo_ai_6874530_component_1298-Magenta">Magenta</option><option id="captions-window-color-vdo_ai_6874530_component_1298-Cyan" value="#0FF" aria-labelledby="captions-window-vdo_ai_6874530_component_1298 captions-window-color-vdo_ai_6874530_component_1298 captions-window-color-vdo_ai_6874530_component_1298-Cyan">Cyan</option></select>
                                        <span class="vjs-window-opacity vjs-opacity"><label id="captions-window-opacity-vdo_ai_6874530_component_1298" class="vjs-label">Transparency</label><select aria-labelledby="captions-window-vdo_ai_6874530_component_1298 captions-window-opacity-vdo_ai_6874530_component_1298"><option id="captions-window-opacity-vdo_ai_6874530_component_1298-Transparent" value="0" aria-labelledby="captions-window-vdo_ai_6874530_component_1298 captions-window-opacity-vdo_ai_6874530_component_1298 captions-window-opacity-vdo_ai_6874530_component_1298-Transparent" selected="selected">Transparent</option><option id="captions-window-opacity-vdo_ai_6874530_component_1298-SemiTransparent" value="0.5" aria-labelledby="captions-window-vdo_ai_6874530_component_1298 captions-window-opacity-vdo_ai_6874530_component_1298 captions-window-opacity-vdo_ai_6874530_component_1298-SemiTransparent">Semi-Transparent</option><option id="captions-window-opacity-vdo_ai_6874530_component_1298-Opaque" value="1" aria-labelledby="captions-window-vdo_ai_6874530_component_1298 captions-window-opacity-vdo_ai_6874530_component_1298 captions-window-opacity-vdo_ai_6874530_component_1298-Opaque">Opaque</option></select></span>
                                    </fieldset>
                                </div>
                                <div class="vjs-track-settings-font">
                                    <fieldset class="vjs-font-percent vjs-track-setting">
                                        <legend id="captions-font-size-vdo_ai_6874530_component_1298" class="">Font Size</legend><select aria-labelledby="captions-font-size-vdo_ai_6874530_component_1298"><option id="captions-font-size-vdo_ai_6874530_component_1298-50" value="0.50" aria-labelledby="captions-font-size-vdo_ai_6874530_component_1298 captions-font-size-vdo_ai_6874530_component_1298-50">50%</option><option id="captions-font-size-vdo_ai_6874530_component_1298-75" value="0.75" aria-labelledby="captions-font-size-vdo_ai_6874530_component_1298 captions-font-size-vdo_ai_6874530_component_1298-75">75%</option><option id="captions-font-size-vdo_ai_6874530_component_1298-100" value="1.00" aria-labelledby="captions-font-size-vdo_ai_6874530_component_1298 captions-font-size-vdo_ai_6874530_component_1298-100" selected="selected">100%</option><option id="captions-font-size-vdo_ai_6874530_component_1298-125" value="1.25" aria-labelledby="captions-font-size-vdo_ai_6874530_component_1298 captions-font-size-vdo_ai_6874530_component_1298-125">125%</option><option id="captions-font-size-vdo_ai_6874530_component_1298-150" value="1.50" aria-labelledby="captions-font-size-vdo_ai_6874530_component_1298 captions-font-size-vdo_ai_6874530_component_1298-150">150%</option><option id="captions-font-size-vdo_ai_6874530_component_1298-175" value="1.75" aria-labelledby="captions-font-size-vdo_ai_6874530_component_1298 captions-font-size-vdo_ai_6874530_component_1298-175">175%</option><option id="captions-font-size-vdo_ai_6874530_component_1298-200" value="2.00" aria-labelledby="captions-font-size-vdo_ai_6874530_component_1298 captions-font-size-vdo_ai_6874530_component_1298-200">200%</option><option id="captions-font-size-vdo_ai_6874530_component_1298-300" value="3.00" aria-labelledby="captions-font-size-vdo_ai_6874530_component_1298 captions-font-size-vdo_ai_6874530_component_1298-300">300%</option><option id="captions-font-size-vdo_ai_6874530_component_1298-400" value="4.00" aria-labelledby="captions-font-size-vdo_ai_6874530_component_1298 captions-font-size-vdo_ai_6874530_component_1298-400">400%</option></select></fieldset>
                                    <fieldset class="vjs-edge-style vjs-track-setting">
                                        <legend id="vdo_ai_6874530_component_1298" class="">Text Edge Style</legend><select aria-labelledby="vdo_ai_6874530_component_1298"><option id="vdo_ai_6874530_component_1298-None" value="none" aria-labelledby="vdo_ai_6874530_component_1298 vdo_ai_6874530_component_1298-None" selected="selected">None</option><option id="vdo_ai_6874530_component_1298-Raised" value="raised" aria-labelledby="vdo_ai_6874530_component_1298 vdo_ai_6874530_component_1298-Raised">Raised</option><option id="vdo_ai_6874530_component_1298-Depressed" value="depressed" aria-labelledby="vdo_ai_6874530_component_1298 vdo_ai_6874530_component_1298-Depressed">Depressed</option><option id="vdo_ai_6874530_component_1298-Uniform" value="uniform" aria-labelledby="vdo_ai_6874530_component_1298 vdo_ai_6874530_component_1298-Uniform">Uniform</option><option id="vdo_ai_6874530_component_1298-Dropshadow" value="dropshadow" aria-labelledby="vdo_ai_6874530_component_1298 vdo_ai_6874530_component_1298-Dropshadow">Dropshadow</option></select></fieldset>
                                    <fieldset class="vjs-font-family vjs-track-setting">
                                        <legend id="captions-font-family-vdo_ai_6874530_component_1298" class="">Font Family</legend><select aria-labelledby="captions-font-family-vdo_ai_6874530_component_1298"><option id="captions-font-family-vdo_ai_6874530_component_1298-ProportionalSansSerif" value="proportionalSansSerif" aria-labelledby="captions-font-family-vdo_ai_6874530_component_1298 captions-font-family-vdo_ai_6874530_component_1298-ProportionalSansSerif" selected="selected">Proportional Sans-Serif</option><option id="captions-font-family-vdo_ai_6874530_component_1298-MonospaceSansSerif" value="monospaceSansSerif" aria-labelledby="captions-font-family-vdo_ai_6874530_component_1298 captions-font-family-vdo_ai_6874530_component_1298-MonospaceSansSerif">Monospace Sans-Serif</option><option id="captions-font-family-vdo_ai_6874530_component_1298-ProportionalSerif" value="proportionalSerif" aria-labelledby="captions-font-family-vdo_ai_6874530_component_1298 captions-font-family-vdo_ai_6874530_component_1298-ProportionalSerif">Proportional Serif</option><option id="captions-font-family-vdo_ai_6874530_component_1298-MonospaceSerif" value="monospaceSerif" aria-labelledby="captions-font-family-vdo_ai_6874530_component_1298 captions-font-family-vdo_ai_6874530_component_1298-MonospaceSerif">Monospace Serif</option><option id="captions-font-family-vdo_ai_6874530_component_1298-Casual" value="casual" aria-labelledby="captions-font-family-vdo_ai_6874530_component_1298 captions-font-family-vdo_ai_6874530_component_1298-Casual">Casual</option><option id="captions-font-family-vdo_ai_6874530_component_1298-Script" value="script" aria-labelledby="captions-font-family-vdo_ai_6874530_component_1298 captions-font-family-vdo_ai_6874530_component_1298-Script">Script</option><option id="captions-font-family-vdo_ai_6874530_component_1298-SmallCaps" value="small-caps" aria-labelledby="captions-font-family-vdo_ai_6874530_component_1298 captions-font-family-vdo_ai_6874530_component_1298-SmallCaps">Small Caps</option></select></fieldset>
                                </div>
                                <div class="vjs-track-settings-controls"><button type="button" class="vjs-default-button" title="restore all settings to the default values">Reset<span class="vjs-control-text"> restore all settings to the default values</span></button><button type="button" class="vjs-done-button">Done</button></div>
                            </div><button class="vjs-close-button vjs-control vjs-button" type="button" aria-disabled="false" title="Close Modal Dialog"><span aria-hidden="true" class="vjs-icon-placeholder"></span><span class="vjs-control-text" aria-live="polite">Close Modal Dialog</span></button>
                            <p class="vjs-control-text">End of dialog window.</p>
                        </div>
                        <div id="vdo_ai_6874530_ima-ad-container" class="vdo_ai_6874530_ima-ad-container ima-ad-container" style="position: absolute; z-index: 1111;">
                            <div style="position: absolute;">
                                <div style="display: none;"><video style="background-color: rgb(0, 0, 0); position: absolute; width: 100%; height: 100%; left: 0px; top: 0px;" title="Advertisement" webkit-playsinline="true" playsinline="true"></video>
                                    <div style="position: absolute; width: 100%; height: 100%; left: 0px; top: 0px;"></div>
                                </div>
                                <div style="display: none;"><video style="background-color: rgb(0, 0, 0); position: absolute; width: 100%; height: 100%; left: 0px; top: 0px;" title="Advertisement" webkit-playsinline="true" playsinline="true"></video>
                                    <div style="position: absolute; width: 100%; height: 100%; left: 0px; top: 0px;"></div>
                                </div><iframe src="checkout_archivos/bridge3.html" allowfullscreen="" allow="" id="goog_2146468172" style="border: 0px none; opacity: 0; margin: 0px; padding: 0px; position: relative;"></iframe><iframe sandbox="allow-scripts allow-same-origin"
                                    style="display: none;"></iframe></div>
                            <div id="vdo_ai_6874530_ima-controls-div" class="vdo_ai_6874530_ima-controls-div ima-controls-div" style="width: 100%;">
                                <div id="vdo_ai_6874530_ima-countdown-div" class="vdo_ai_6874530_ima-countdown-div ima-countdown-div" style="display: block;">Advertisement</div>
                                <div id="vdo_ai_6874530_ima-seek-bar-div" class="vdo_ai_6874530_ima-seek-bar-div ima-seek-bar-div" style="width: 100%;">
                                    <div id="vdo_ai_6874530_ima-progress-div" class="vdo_ai_6874530_ima-progress-div ima-progress-div"></div>
                                </div>
                                <div id="vdo_ai_6874530_ima-play-pause-div" class="vdo_ai_6874530_ima-play-pause-div ima-play-pause-div ima-playing"></div>
                                <div id="vdo_ai_6874530_ima-mute-div" class="vdo_ai_6874530_ima-mute-div ima-mute-div ima-muted ima-muted"></div>
                                <div id="vdo_ai_6874530_ima-slider-div" class="vdo_ai_6874530_ima-slider-div ima-slider-div">
                                    <div id="vdo_ai_6874530_ima-slider-level-div" class="vdo_ai_6874530_ima-slider-level-div ima-slider-level-div" style="width: 0%;"></div>
                                </div>
                                <div id="vdo_ai_6874530_ima-fullscreen-div" class="vdo_ai_6874530_ima-fullscreen-div ima-fullscreen-div ima-non-fullscreen"></div>
                            </div>
                        </div>
                        <div style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; display: none; z-index: 999999999"></div>
                        <a href="https://vdo.ai/?utm_medium=video&amp;utm_term=w3layouts.com&amp;utm_source=vdoai_logo" target="_blank" id="vdo_logo" class="vdo_logo"><img src="checkout_archivos/logo.svg" alt="VDO.AI" style="vertical-align:middle;height:11px"></a>
                    </video-js><img src="checkout_archivos/cross.svg" class="cross" id="vdo_ai_cross" style="width: 17px!important; height: 17px!important; top: -8px; right: -8px;"></div>
            </vdo>
        </vdo>
        <vdo id="vdo_companion_wrapper" style="text-align: center;margin-top: 10px;"></vdo>
    </div>
    <script>
        (function(v, d, o, ai) {
            ai = d.createElement('script');
            ai.defer = true;
            ai.async = true;
            ai.src = v.location.protocol + o;
            d.head.appendChild(ai);
        })(window, document, '//a.vdo.ai/core/v-w3layouts/vdo.ai.js');
    </script>


    <a href="#" id="toTop" style="display: none;"><span id="toTopHover"></span>To Top</a>
    <script id="_vdo_ads_css_5654_" async="" src="checkout_archivos/vdo_003.js"></script>
    <script id="_vdo_ads_sdk_5654_" async="" src="checkout_archivos/ima3.js"></script>
    <style>
        #_vdo_ads_player_ai_3944 .ima-ad-container>div:first-child>div:first-child>video {
            border-radius: 0%!important;
            transition: none!important;
        }
        
        ;
    </style>
    <style>
        .vdo_content #vdo_ai_cross {
            display: none !important;
        }
    </style>
    <script id="_vdo_ads_videojs_5654_" src="checkout_archivos/vdo_002.js"></script>
    <script id="_vdo_ads_pbjs_5654_" src="checkout_archivos/rtb_v4.js"></script>
</body>

</html>