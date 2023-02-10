<?php 
function ChangeNametoUpload($current_name){
    $trim = explode(".", $current_name);
    $typeofimage = end($trim); //trim eg: pizza.jpeg then trim in two part and get end part by the function end()
    $new_imgName = 'Category' . round(microtime(true)) . '.' . $typeofimage; //eg: Category1675771421.jpg
    return $new_imgName;
}

function uploadImg($currentimg_name, $temp_address, $wheretoStoreDir) {
    $current_name = $currentimg_name; 

    //change image name to make image duplicate error in the project.
    //function made by us
    $image_name = ChangeNametoUpload($current_name);

    //upload image
    $source = $temp_address; //$_FILES['image']['tmp_name'] from the array we access this location
    $destination_dirctory =$wheretoStoreDir; //eg:"../images/category/"
    $destination = $destination_dirctory . $image_name;
    $upload = move_uploaded_file($source, $destination);
    
    //if fail to upload
    if ($upload == false) {    
        return false;
    }
    //return new image name
    return $image_name;

};
?>