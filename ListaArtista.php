<?php
session_start();

require_once "LigarBD.php";
$faqs = $conn->query("select * from artista");
if (!$faqs) {
    die('Erro ao aceder à tabela de artista');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta email="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>MixMusic</title>
    <link rel="stylesheet" href="http://cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php require_once "partials/sidebar.php"; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php
                require_once "partials/topbar.php";

                ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <?php
                    require_once "partials/msg_sucesso.php";
                    require_once "partials/msg_erros.php";
                    ?>
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Lista de Artistas</h1>
                    </div>
                    <div>
                        <table id="tabelaArtista">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Qt_Seguidores</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($faq = $faqs -> fetch_array(MYSQLI_ASSOC)) :
                                ?>
                                    <tr>
                                        <td><?= $faq["nome"] ?></td>
                                        <td><?= $faq["qt_seguidores"] ?></td>
                                    </tr>
                                <?php
                                endwhile;
                                ?>
                            </tbody>
                        </table>
                    </div>

                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <?php require_once "partials/footer.php"; ?>


        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php require_once "partials/modal_logout.php"; ?>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="http://cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tabelaArtista').DataTable({
                "language": {
                    "sProcessing": "Em processamento...",
                    "sLengthMenu": "Mostrar _MENU_ registos",
                    "sZeroRecords": "Nenhum resultado encontrado",
                    "sEmptyTable": "Não há dados disponíveis nesta tabela",
                    "sInfo": "Mostrando registos de _START_ a _END_ de um total de _TOTAL_ registos",
                    "sInfoEmpty": "Mostrando registos de 0 a 0 de um total de 0 registos",
                    "sInfoFiltered": "(filtrando um total de _MAX_ registos)",
                    "sInfoPostFix": "",
                    "sSearch": "Pesquisar:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Carregando...",
                    "oAria": {
                    "sSortAscending": ": Ative para classificar a coluna em ordem crescente",
                    "sSortDescending": ": Ative para classificar a coluna em ordem decrescente"
                    }
                }
            });
        });
    </script>



</body>

</html>