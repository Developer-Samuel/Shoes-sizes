<?php include_once('templates/head.php'); ?>
<body>
    <div class="background-image">
        <div class="sizes">
            <div class="nike-sizes">
                <h2>NIKE</h2>
                <p>CM = US * 3</p>
                <p>UK = US * 12%</p>
                <p>EU = US / 3%</p>
            </div>
            <div class="adidas-sizes">
                <h2>ADIDAS</h2>
                <p>CM = US * 2.3</p>
                <p>UK = US * 11.2%</p>
                <p>EU = US / 3%</p>
            </div>
        </div>
        <form class="shoes-form" action="add-shoes" method="POST">
            <div class="shoes-groups">
                <div class="form-group">
                    <label for="name">Name</label>
                    <br>
                    <input type="text" name="name" required>
                </div>
                <div class="form-group">
                    <label for="us_size">Size [US]</label>
                    <br>
                    <select name="us_size" id="us-size">
                        <option value=""></option>
                        <option value="3.5">3.5</option>
                        <?php foreach($sizes as $size): ?>
                            <option value="<?php echo $size['size']; ?>">
                                <?php echo $size['size']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <!--<input type="number" name="size" value="3.5" min="3.5" max="22" step="0.5">-->
                </div>
                <button type="submit" name="AddShoes" class="btn btn-add"><img src="icons/add.png"></button>
            </div>        
        </form>
        <table class="shoes-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>[US]</th>
                    <th>[CM]</th>
                    <th>[UK]</th>
                    <th>[EU]</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; ?>
                <?php foreach($shoes as $shoe_parameters): ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $shoe_parameters['name']; ?></td>
                    <td><?php echo $shoe_parameters['us_size']; ?></td>
                    <td><?php echo $shoe_parameters['cm_size']; ?></td>
                    <td><?php echo $shoe_parameters['uk_size']; ?></td>
                    <td><?php echo $shoe_parameters['eu_size']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php include_once('templates/scripts.php'); ?>
</body>
</html>