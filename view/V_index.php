

<body>
    <br />
    <div class="container"><br />
        <div class="row"><br />
            <h2>Crud en Php</h2><p>

        </div><p><br />
        <div class="row">               
          <button class="btn-add"><a href="view/V_add.php" class="btn btn-success btn-add">Ajouter un user</a></button>
            <div class="table-responsive"><br />
                <table class="table table-hover table-bordered"><br />
                    <thead>
                        <th>Name</th><p>
                        <th>Firstname</th><p>
                        <th>Age</th><p>
                        <th>Tel</th><p>
                        <th>Country</th><p>
                        <th>Email</th><p>
                        <th>Comment</th><p>
                        <th>Job</th><p>
                        <th>Url</th><p>
                        <th>Edition</th><p>
                    </thead><p><br />
                    <tbody>
                    <?php
                        include('controller/C_index.php');
                    ?>

                    </tbody>
                    <p>
                </table>
                <p>
            </div>
            <p>
        </div>
        <p>
    </div>
    <p>
</body>
<footer>
    <script src="assets/js/bootstrap.min.js"></script>
</footer>
</html>