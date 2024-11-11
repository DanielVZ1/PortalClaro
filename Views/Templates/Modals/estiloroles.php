<style>
    .control-label {
      color: black;
      /* Cambia el color de los labels a negro */
    }

    .shadow__btn {
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

  .shadow__btn {
    background: rgb(0, 140, 255);
    box-shadow: 0 0 25px rgb(0, 140, 255);
  }

  .shadow__btn:hover {
    box-shadow: 0 0 5px rgb(0, 140, 255),
      0 0 25px rgb(0, 140, 255),
      0 0 50px rgb(0, 140, 255),
      0 0 100px rgb(0, 140, 255);
  }

  /* From Uiverse.io by mrhyddenn */
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
  .edit-button {
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
    text-decoration: none !important;
  }

  .edit-svgIcon {
    width: 17px;
    transition-duration: 0.3s;
  }

  .edit-svgIcon path {
    fill: white;
  }

  .edit-button:hover {
    width: 120px;
    border-radius: 50px;
    transition-duration: 0.3s;
    background-color: rgb(0, 123, 255);
    /* Color azul */
    align-items: center;
  }

  .edit-button:hover .edit-svgIcon {
    width: 20px;
    transition-duration: 0.3s;
    transform: translateY(60%);
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    transform: rotate(360deg);
  }

  .edit-button::before {
    display: none;
    content: "Editar";
    color: white;
    transition-duration: 0.3s;
    font-size: 2px;
  }

  .edit-button:hover::before {
    display: block;
    padding-right: 10px;
    font-size: 13px;
    opacity: 1;
    transform: translateY(0px);
    transition-duration: 0.3s;
  }

  /* From Uiverse.io by MUJTABA201566 */
  .lock-button {
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
    text-decoration: none !important;
  }

  .lock-svgIcon {
    width: 17px;
    transition-duration: 0.3s;
  }

  .lock-svgIcon path {
    fill: white;
  }

  .lock-button:hover {
    border-radius: 50px;
    transition-duration: 0.3s;
    background-color: rgb(255, 69, 69);
    align-items: center;
  }

  .lock-button:hover .lock-svgIcon {
    width: 20px;
    transition-duration: 0.3s;
  
  }

  .lock-button::before {
    display: none;
    color: white;
    transition-duration: 0.3s;
  }

  .lock-button:hover::before {
    display: block;
    opacity: 1;
    transform: translateY(0px);
    transition-duration: 0.3s;
  }
  </style>