<style>
        .button {
            -moz-appearance: none;
            -webkit-appearance: none;
            appearance: none;
            border: none;
            background: none;
            color: #0f1923;
            cursor: pointer;
            position: relative;
            padding: 8px;
            margin-bottom: 20px;
            text-transform: uppercase;
            font-weight: bold;
            font-size: 14px;
            transition: all .15s ease;
        }

        .button::before,
        .button::after {
            content: '';
            display: block;
            position: absolute;
            right: 0;
            left: 0;
            height: calc(50% - 5px);
            border: 1px solid #7D8082;
            transition: all .15s ease;
        }

        .button::before {
            top: 0;
            border-bottom-width: 0;
        }

        .button::after {
            bottom: 0;
            border-top-width: 0;
        }

        .button:active,
        .button:focus {
            outline: none;
        }

        .button:active::before,
        .button:active::after {
            right: 3px;
            left: 3px;
        }

        .button:active::before {
            top: 3px;
        }

        .button:active::after {
            bottom: 3px;
        }

        .button_lg {
            position: relative;
            display: block;
            padding: 10px 20px;
            color: #fff;
            background-color: #0f1923;
            overflow: hidden;
            box-shadow: inset 0px 0px 0px 1px transparent;
        }

        .button_lg::before {
            content: '';
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            width: 2px;
            height: 2px;
            background-color: #0f1923;
        }

        .button_lg::after {
            content: '';
            display: block;
            position: absolute;
            right: 0;
            bottom: 0;
            width: 4px;
            height: 4px;
            background-color: #0f1923;
            transition: all .2s ease;
        }

        .button_sl {
            display: block;
            position: absolute;
            top: 0;
            bottom: -1px;
            left: -8px;
            width: 0;
            background-color: #4CAF50;
            transform: skew(-15deg);
            transition: all .2s ease;
        }

        .button_text {
            position: relative;
        }

        .button:hover {
            color: #0f1923;
        }

        .button:hover .button_sl {
            width: calc(100% + 15px);
        }

        .button:hover .button_lg::after {
            background-color: #fff;
        }

        /* From Uiverse.io by aaronross1 */
        .delete-button {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: rgb(20, 20, 20);
            border: none;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.164);
            cursor: pointer;
            transition-duration: 0.3s;
            overflow: hidden;
            position: relative;
        }

        .delete-svgIcon {
            width: 15px;
            transition-duration: 0.3s;
        }

        .delete-svgIcon path {
            fill: white;
        }

        .delete-button:hover {
            width: 90px;
            border-radius: 50px;
            transition-duration: 0.3s;
            background-color: rgb(255, 69, 69);
            align-items: center;
        }

        .delete-button:hover .delete-svgIcon {
            width: 20px;
            transition-duration: 0.3s;
            transform: translateY(60%);
            -webkit-transform: rotate(360deg);
            -moz-transform: rotate(360deg);
            -o-transform: rotate(360deg);
            -ms-transform: rotate(360deg);
            transform: rotate(360deg);
        }

        .delete-button::before {
            display: none;
            content: "Eliminar";
            color: white;
            transition-duration: 0.3s;
            font-size: 2px;
        }

        .delete-button:hover::before {
            display: block;
            padding-right: 10px;
            font-size: 13px;
            opacity: 1;
            transform: translateY(0px);
            transition-duration: 0.3s;
        }

        .button1 {
            -moz-appearance: none;
            -webkit-appearance: none;
            appearance: none;
            border: none;
            background: none;
            color: #0f1923;
            cursor: pointer;
            position: relative;
            padding: 8px;
            margin-bottom: 20px;
            text-transform: uppercase;
            font-weight: bold;
            font-size: 14px;
            transition: all .15s ease;
        }

        .button1::before,
        .button1::after {
            content: '';
            display: block;
            position: absolute;
            right: 0;
            left: 0;
            height: calc(50% - 5px);
            border: 1px solid #7D8082;
            transition: all .15s ease;
        }

        .button1::before {
            top: 0;
            border-bottom-width: 0;
        }

        .button1::after {
            bottom: 0;
            border-top-width: 0;
        }

        .button1:active,
        .button1:focus {
            outline: none;
        }

        .button1:active::before,
        .button1:active::after {
            right: 3px;
            left: 3px;
        }

        .button1:active::before {
            top: 3px;
        }

        .button1:active::after {
            bottom: 3px;
        }

        .button1_lg {
            position: relative;
            display: block;
            padding: 10px 20px;
            color: #fff;
            background-color: #0f1923;
            overflow: hidden;
            box-shadow: inset 0px 0px 0px 1px transparent;
        }

        .button1_lg::before {
            content: '';
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            width: 2px;
            height: 2px;
            background-color: #0f1923;
        }

        .button1_lg::after {
            content: '';
            display: block;
            position: absolute;
            right: 0;
            bottom: 0;
            width: 4px;
            height: 4px;
            background-color: #0f1923;
            transition: all .2s ease;
        }

        .button1_sl {
            display: block;
            position: absolute;
            top: 0;
            bottom: -1px;
            left: -8px;
            width: 0;
            background-color: #007BFF;
            transform: skew(-15deg);
            transition: all .2s ease;
        }

        .button1_text {
            position: relative;
        }

        .button1:hover {
            color: #0f1923;
        }

        .button1:hover .button1_sl {
            width: calc(100% + 15px);
        }

        .button1:hover .button1_lg::after {
            background-color: #fff;
        }
    </style>