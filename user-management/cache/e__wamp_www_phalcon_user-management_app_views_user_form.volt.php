<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.js"></script>
    </head>
    <body>
    <div class="ui menu">
        <?= $this->tag->linkTo(['user/index', 'Retour à la liste ...', 'class' => 'item']) ?>
    </div>
    <div class="ui icon message">
        <i class="info icon"></i>
        <div class="content">
            <div class="header">
                Message
            </div>
            <p>Modification de l'utilisateur Truc much</p>
        </div>
    </div>
    <table id="example" class="ui celled table" cellspacing="0" width="100%">
        <tr>
            <td>
                <p>Prénom</p>
                <div class="ui input">
                    <input type="text">
                </div>
            </td>
            <td>
                <p>Nom</p>
                <div class="ui input">
                    <input type="text">
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <p>Login</p>
                <div class="ui input">
                    <input type="text">
                </div>
            </td>
            <td>
                <p>Mot de passe</p>
                <div class="ui input">
                    <input type="text">
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <p>Email</p>
                <div class="ui fluid action input">
                    <input type="text">
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <p>Rôle</p>
                <div class="ui fluid input">
                    <input type="text">
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <button class="fluid ui green button">Valider</button>
            </td>
            <td>
                <button class="fluid ui grey button">Réinitialiser</button>
            </td>
        </tr>
    </table>
    </body>
</html>

