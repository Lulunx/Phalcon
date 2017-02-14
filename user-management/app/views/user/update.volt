<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.js"></script>
    </head>
    <body>
    <div class="ui menu">
        <a class="item" href="{{ url("user/index") }}">
            <i class="sign out icon">
            </i>
            Retour à la liste ...
        </a>
    </div>
    <div class="ui icon message">
        <i class="info icon"></i>
        <div class="content">
            <div class="header">
                Message
            </div>
            <p>Modification de l'utilisateur {{ user.getFirstname() }} {{ user.getLastname() }}</p>
        </div>
    </div>
    <form action="{{url("user/message/update/"~user.getId())}}"  method="post">
        <table id="example" class="ui celled table" cellspacing="0" width="100%">
            <tr>
                <td>
                    <p>Prénom</p>
                    <div style="width: 100%" class="ui input">
                        <input name="firstname" type="text" value="{{ user.getFirstname() }}">
                    </div>
                </td>
                <td>
                    <p>Nom</p>
                    <div style="width: 100%" class="ui input">
                        <input name="lastname" type="text" value="{{ user.getLastname() }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Login</p>
                    <div style="width: 100%" class="ui input">
                        <input name="login" type="text" value="{{ user.getLogin() }}">
                    </div>
                </td>
                <td>
                    <p>Mot de passe</p>
                    <div style="width: 100%" class="ui input">
                        <input name="password" type="text" value="{{ user.getPassword() }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <p>Email</p>
                    <div style="width: 100%" class="ui input">
                        <input name="email" type="text" value="{{ user.getEmail() }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <p>Rôle</p>
                    <div style="width: 100%" class="ui input">
                        <input name="role" type="text" value="{{ user.getRole().getName() }}">
                    </div>
                </td>
            </tr>

        </table>
        <div class="ui two bottom attached buttons">
            <input type="submit" class="fluid ui green button" value="Sauvegarder">
            <input type="reset" class="fluid ui grey button">
        </div>
    </form>

    </body>
</html>

