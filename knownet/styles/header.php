<style>
    @import url('https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;500&display=swap');

    * {
        margin: 0;
        padding: 0;
    }
    header {
        background-color:      #303030;
        display:                    flex;
        flex-direction:              row;
        align-items:              center;
        padding:                     8px;
        border-bottom-left-radius:  15px;
        border-bottom-right-radius: 15px;
        font-family: 'Baloo 2' , cursive;
        font-size:                  13px;
        letter-spacing:          0.03rem;
        box-shadow: 0px 9px 15px -1px rgba(0, 0, 0, 0.25);
    }

    .logo {
        margin-left:  15%;
        margin-right: 2% ;
        width:      130px;
    }

    .barraPesquisar {
        display:                  flex;
        justify-content: space-between;
        width:                    100%;
        max-width:               360px;
        border-radius:             6px;
        background-color:      #454545;
    }

    ::-webkit-input-placeholder{
        color:  #E9E9E9;
    }

    .input {
        outline:     none;
        border:      none;
        background:  none;
        width:        88%;
        height:      24px;
        font-size: 0.8rem;
        color:    #E9E9E9;
        margin:  8px 16px;
    }

    .btnPesquisar {
        display:                   flex;
        justify-content:         center;
        align-items:             center;
        width:                      12%;
        background-color:       #707070;
        border-bottom-right-radius: 6px;
        border-top-right-radius:    6px;
        border:                    none;
    }

    .lupa {
        width:         38%;
        align-self: center;
    }

    .iconsNav {
        display:                  flex;
        flex-direction:            row;
        width:                    100%;
        justify-content: space-between;
        align-items:            center;
        margin:       12px 32px 0 24px;
    }

    .iconsNav .section-left a {
        display:          flex;
        flex-direction: column;
        align-items:    center;
        width:            16px;
        text-decoration:  none;
        color:         #E9E9E9;
    }

    .iconsNav .section-left a img {
        width: 32px;
    }

    .section-left {
        width:                    50%;
        display:                 flex;
        justify-content: space-evenly;
    }


</style>