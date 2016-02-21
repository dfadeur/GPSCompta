<!DOCTYPE html>
<head>
    <meta http-equiv='Content-Type' content='text/html;charset=UTF-8'>
    <!--<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,600italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>-->
    <style>
        @page { margin: 50px 46px 50px; }
        #footer { position: fixed; text-align: center; bottom: 20px; font: italic 500 15px 'Source Sans Pro'; }
        #footer .page:after { content: counter(page, decimal); }
        td {
            border:thin solid black;
            padding: 3px 3px 3px 5px;
            font: 12px 'Source Sans Pro';
        }
    </style>
</head>
<div id='footer'>
    <p class='page'>--Tableau vété non résidents 2015-- </p>
</div>
<article id='admin'>
    <header>
        <img src='img/logo-small.png'>
        <H1>Facture n° <?php echo ($facture->id) ;?></H1>

        <p>nombre total d'inscriptions concernées (nombre de lignes) : </p>
    </header>
    <section>
        <TABLE BORDER='1'>
            <TR>
                <TH> Date</TH>
                <TH> Heure</TH>
                <TH> Nom</TH>
                <TH> 1er prénom</TH>
                <TH> Sexe</TH>
                <TH> Lieu de naissance</TH>
                <TH> Date de naissance</TH>
                <TH> Nationalité</TH>
                <TH> N° de pièce d'identité</TH>
                <TH> Cursus</TH>
            </TR>


            <TR>
                <TD></TD>
                <TD></TD>
                <TD></TD>
                <TD></TD>
                <TD></TD>
                <TD></TD>
                <TD></TD>
                <TD></TD>
                <TD></TD>
                <TD></TD>
            </TR>

        </TABLE>
    </section>
</article>
</html>