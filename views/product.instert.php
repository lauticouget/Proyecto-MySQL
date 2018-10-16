<!-- INGRESAR NUEVO PRODUCTO -->
<?php
if(Session::adminController()){ ?>
<div class="container">
    <form class="mt-1 bg-light rounded border border-dark container-fluid" action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="addProduct">
        <h1>Ingresar Producto</h1>
        <hr>
            <div class="form-group">
                <label >Nombre</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label >Precio $</label>
                <input type="number" class="form-control" name="price">
            </div>
            <div class="form-group">
                <label >Categoria</label>
                <select name="category" class="form-control" id="">
                    <option value="1">Jugetes</option>
                    <option value="2">Comida</option>1
                    <option value="3" >Medicamentos</option>
                </select>
            </div>
            <div class="form-group">
                <label >Imagen</label>
                <input type="file" class="mb-3 form-control" name="image">
                <?php  
                if(isset($productImageErrores['image'])) { ?>
				<span style="margin-top: 40px" class=" alert alert-danger"><?= $productImageErrores['image'] ?> </span>
				<?php } ?>
            </div>
            <div class="form-group form-inline">
                <input type="submit">
                <input type="reset">
                <?php  
                if ($_POST){
                        if (isset($savedProduct)){
                            if($savedProduct['name']== $_POST['name']) { ?>
                                <span style="margin-top: 40px" class=" alert alert-success"><?= "El Producto ah sido añadido." ?> </span>
                                <?php } 
                        }
                    }
                    
                ?>
            </div>
    </form>
</div>
<?php } ?>