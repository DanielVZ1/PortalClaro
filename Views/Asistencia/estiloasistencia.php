<style>
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

        /* From Uiverse.io by aaronross1 */
        .visualize-button {
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

        .visualize-svgIcon {
            width: 24px;
            transition-duration: 0.3s;
        }

        .visualize-svgIcon path {
            fill: white;
        }

        .visualize-button:hover {
            width: 90px;
            border-radius: 50px;
            transition-duration: 0.3s;
            background-color: rgb(169, 169, 169);
            align-items: center;
        }

        .visualize-button:hover .visualize-svgIcon {
            width: 24px;
            transition-duration: 0.3s;
            transform: translateY(60%);
            -webkit-transform: rotate(360deg);
            -moz-transform: rotate(360deg);
            -o-transform: rotate(360deg);
            -ms-transform: rotate(360deg);
            transform: rotate(360deg);
        }

        .visualize-button::before {
            display: none;
            content: "Ver";
            color: white;
            transition-duration: 0.3s;
            font-size: 2px;
        }

        .visualize-button:hover::before {
            display: block;
            padding-right: 10px;
            font-size: 13px;
            opacity: 1;
            transform: translateY(0px);
            transition-duration: 0.3s;
        }


        .shadow__btn--red {
            padding: 5px 10px;
            border: none;
            font-size: 12px;
            color: #fff;
            border-radius: 7px;
            letter-spacing: 1px;
            font-weight: 700;
            text-transform: uppercase;
            transition: 0.5s;
            transition-property: box-shadow;
        }

        .shadow__btn--red {
            background: rgb(255, 0, 0);
            /* Rojo */
            box-shadow: 0 0 25px rgb(255, 0, 0);
            /* Rojo */
        }

        .shadow__btn--red:hover {
            box-shadow: 0 0 5px rgb(255, 0, 0),
                /* Rojo */
                0 0 25px rgb(255, 0, 0),
                /* Rojo */
                0 0 50px rgb(255, 0, 0),
                /* Rojo */
                0 0 100px rgb(255, 0, 0);
            /* Rojo */
        }
    </style>