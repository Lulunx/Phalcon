<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.js"></script>
    </head>
    <body>
    <div class="ui icon message">
        <i class="info icon"></i>
        <div class="content">
            <div class="header">
                <?= $message ?>
            </div>
        </div>
    </div>
    <?= $this->tag->linkTo(['user/index', 'Retour à la page d\'accueil', 'class' => 'green fluid ui button']) ?>
    </body>
</html>

