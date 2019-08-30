<table border="0" cellpadding="0" cellspacing="0" height="100%" lang="es" style="min-width:348px;" width="100%">
    <tbody>
        <tr height="32" style="height:32px">
            <td>
            </td>
        </tr>
        <tr align="center">
            <td>
                <div>
                    <div>
                    </div>
                </div>
                <table border="0" cellpadding="0" cellspacing="0" style="padding-bottom:20px;max-width:600px;min-width:300px">
                    <tbody>
                        <tr>
                            <td style="width:8px" width="8">
                            </td>
                            <td>
                                <div align="center" style="border-style:solid;border-width:thin;border-color:#dadce0;border-radius:8px;padding:40px 20px; background-color: #fff;">
                                    <img src="{{ asset('img/logo.png') }}" style="width:20% ;margin-bottom:16px;"/>
                                    <div style="font-family:'Google Sans',Roboto,RobotoDraft,Helvetica,Arial,sans-serif;border-bottom:thin solid #dadce0;color:rgba(0,0,0,0.87);line-height:32px;padding-bottom:24px;text-align:center;word-break:break-word">
                                        <div style="font-size:24px">
                                            Cambio de Contraseña
                                        </div>
                                    </div>
                                    <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:14px;color:rgba(0,0,0,0.87);line-height:20px;padding-top:20px;text-align:center;">
                                        <b>¡Hola!</b> Estas recibiendo este email porque se ha solicitado un cambio de contraseña para tu cuenta de MiShopp.
                                        <br/>
                                        <br/>
                                        Para confirmar el cambio de contraseña <br>has click en el siguiente botón.
                                        <div style="padding-top:25px;text-align:center; margin-bottom: 15px;">
                                            <a href="{{ route('password.reset', $token) }}" style="font-family:'Google Sans',Roboto,RobotoDraft,Helvetica,Arial,sans-serif;line-height:16px;color:#ffffff;font-weight:400;text-decoration:none;font-size:14px;display:inline-block;padding:10px 24px;background-color:#4184f3;border-radius:5px;min-width:90px" target="_blank" data-saferedirecturl="">
                                                Restablecer Contraseña ➡
                                            </a>
                                        </div>
                                        <span style="font-weight: 700;">
                                            ¡Este enlace para restablecer la contraseña caduca en 60 minutos!
                                        </span>
                                        <div style="margin: auto; word-break: break-all; overflow-wrap: break-word; word-wrap: break-word; width: 75%;">
                                            
                                            <p style="font-size: 13px; margin-top: 15px; margin-bottom: 10px;">¿No funciona el botón? Prueba con este enlace:</p>
                                            <a href="{{ route('password.reset', $token) }}" style="color: #094c7b;">
                                                {{ route('password.reset', $token) }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div style="text-align:left">
                                    <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;color:rgba(0,0,0,0.54);font-size:11px;line-height:18px;padding-top:12px;text-align:center">
                                        <div>
                                            Has recibido este correo electrónico porque solicitaste cambiar tu contraseña de tu cuenta de MiShopp. Si no has realizado esta solicitud, ponte en contacto con la Ayuda de MiShopp, elimina o ignora este correo.
                                        </div>
                                        <div style="direction:ltr">
                                            <a style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;color:rgba(0,0,0,0.54);font-size:11px;line-height:18px;padding-top:12px;text-align:center">
                                                © Copyright 2019 MiShopp C.A. Todos los derechos reservados.
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td style="width:8px" width="8">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
