<html>
<style>
    img {
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
    body {
    height: 200px;
    background-image: linear-gradient(#ffffff, #00ccff);

}
.btn {
	border: none;
	font-family: inherit;
	font-size: inherit;
	color: inherit;
	background: none;
	cursor: pointer;
	padding: 25px 80px;
	display: inline-block;
	margin: 15px 30px;
	text-transform: uppercase;
	letter-spacing: 1px;
	font-weight: 700;
	outline: none;
	position: relative;
	-webkit-transition: all 0.3s;
	-moz-transition: all 0.3s;
	transition: all 0.3s;
}
.btn-1 {
	border: 3px solid #fff;
	color: #000;
}
.btn-1a:hover,
.btn-1a:active {
	color: #0e83cd;
	background: #fff;
}
</style>
<body>
    <form action="index.php" method="POST">
    <center>
        <h1>Random Image Generator</h1>
    
    <div>
    <?php
            ini_set('display_errors', '1');
            
            function GenerateImage()
            {
                $width = "/200";
                $height = "/300";
                $random = "/?random";
                $ImgPath = "https://picsum.photos";
                $gray = "/g";
                if($_POST['radioOption'] == "GrayScale" || $_POST['radioOption'] == "GrayAndSize"){
                    $ImgPath = $ImgPath . $gray;
                }
                if($_POST['radioOption'] == "ImageScale" || $_POST['radioOption'] == "GrayAndSize"){
                    $width = "/400";
                    $height = "/600";
                    $ImgPath = $ImgPath . $width . $height;
                }
                else{
                    $ImgPath = $ImgPath . $width . $height;
                }
                $ImgPath = $ImgPath . $random;
                echo '<img src=' . $ImgPath. '>';
            }
            //if 'ImageGen' was in the input type submit 
            if(array_key_exists('ImageGen',$_POST)){
                GenerateImage();
            }
          
        ?>
        <input class="btn btn-1 btn-1a" type="submit" name="ImageGen" id="ImageGen" value="Random Image" /><br/>
        <input type="radio" name="radioOption" value="GrayScale" >Gray
        <input type="radio" name="radioOption" value="ImageScale" >Change Image Size
        <input type="radio" name="radioOption" value="GrayAndSize" >Both
        
    </div>
    </center>
</form>
</body>
<script>
    //this javascript portion is just for the radio buttons.
    //it is to uncheck the buttons
    var RadioButtons = document.getElementsByName('radioOption');
    var RadioCheck;
    for(var x = 0; x < RadioButtons.length; x++){
        RadioButtons[x].onclick = function() {
            if(RadioCheck == this){
            this.checked = false;
            RadioCheck = null;
            } else {
            RadioCheck = this;
            }
        };
    }
</script>
</html>