<?php
/**
 * Created by PhpStorm.
 * User: raihan
 * Date: 27-Jul-18
 * Time: 2:45 PM
 */
if (!isset($_SESSION)) {
    session_start();
}
include 'insert_product_handler.php';


echo " <form class=\"form-group p-4\"   method=\"post\" enctype='multipart/form-data'>

                    <h2 class=\"text-center font-weight-bold\" style=\"color:darkred\">Add New Vehicle</h2>

                    <div class=\"row\">
                        <div class=\"col-md-6 p-3 \">
                            <label for=\"sel1\">Maker* :</label>
                            <select class=\"form-control rounded-0\" name='maker' required>
                                <option value=''>...</option>
                                <option>AUDI</option>
                                <option>BENZ</option>
                                <option>BMW</option>                                
                                <option>BUGATI</option>
                                <option>CHEVROLET</option>
                                <option>FERRARI</option>
                                <option>FORD</option>
                                <option>JAGUAR</option>
                                <option>JEEP</option>
                                <option>LAMBORGINI</option>
                                <option>McCLAREN</option>
                                <option>MARUTI</option>
                                <option>MITSUBISHI</option>
                                <option>NISSAN</option>
                                <option>PORCHE</option>
                                <option>RENAULT</option>
                                <option>SUZUKI</option>                                
                                <option>TESLA</option>
                                <option>TOYOTA</option>
                                <option>TATA</option>
                                <option>VOLKSWAGON</option>
                            </select>
                        </div>
                        <div class=\"col-md-6 p-3\">
                            <label>Model* :</label>
                            <input type=\"text\" name=\"model\" class=\"form-control rounded-0\" required placeholder=\"Enter Car Model\" pattern='[a-zA-Z]+[a-zA-Z0-9\s-]+' title='only letters,digits  & hyphen are allowed'>
                        </div>
                    </div>

                    <div class=\"row\">

                        <div class=\"col-md-6 p-3\">
                            <label>Body Type* :</label>
                            <select class=\"form-control rounded-0\" name=\"bodytype\" required>
                                <option value=''>...</option>
                                <option>SUV</option>
                                <option>SEDAN</option>
                                <option>SPORTS</option>
                                <option>HATCHBACK</option>
                                <option>MPV</option>
                                <option>COUPE</option>
                                <option>WAGON</option>
                                <option>JEEP</option>
                            </select>
                        </div>

                        <div class=\"col-md-6 p-3\">
                            <label>Engine* :</label>
                            <select class=\"form-control rounded-0\" name='engine' required>
                                <option value=''>...</option>
                                <option>INLINE</option>
                                <option>VEE</option>
                                <option>BOXER</option>
                                <option>ROTARY</option>
                                <option>STRAIGHT</option>
                            </select>
                        </div>

                    </div>

                    <div class=\"row\">
                        <div class=\"col-md-6 p-3\">
                            <label>Fuel* :</label>
                            <select class=\"form-control rounded-0\" name='fuel' required>
                                <option value=''>...</option>
                                <option>Petrol</option>
                                <option>Diesel</option>
                                <option>Octane</option>
                                <option>CNG</option>
                            </select>
                        </div>

                        <div class=\"col-md-6 p-3\">
                            <label>Year of MFG</label>
                            <input type=\"number\" value=\"\" name=\"year\" class=\"form-control rounded-0\" required placeholder=\"Enter Year of MFG\">
                        </div>
                    </div>

                    <div class=\"row\">
                        <div class=\"col-md-6 p-3\">
                            <label>Capacity* :</label>
                            <select class=\"form-control rounded-0\" name='capacity' required>                                                          
                                <option value=''>...</option>
                                <option>2</option>
                                <option>4</option>
                                <option>6</option>
                                <option>8</option>
                                <option>12</option>
                            </select>
                        </div>

                        <div class=\"col-md-6 p-3\">
                            <label>Transmission Type* :</label>
                            <select class=\"form-control rounded-0\" name='transmission' required>
                                <option value=''>...</option>
                                <option>Automatic</option>
                                <option>Manual</option>
                                <option>Automated Manual</option>
                                <option>Continuously Variable</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class='row'>
                        <div class=\"col-md-6 p-3\">
                            <label>Price* :</label>
                            <input type='text' class=\"form-control rounded-0\" name='price' required pattern='[0-9]+' title='digit only'>
                            
                            </input>
                        </div>
                        
                        <div class=\"col-md-6 p-3\">
                            <label>Mileage* :</label>
                            <input type='text' class=\"form-control rounded-0\" name='mileage' required pattern='[0-9]+' title='digit only'>
                                                    </div>
                        
                    </div>

                    <div class=\"row\">
                        <div class=\"col-md-12\">
                            <label>Select an image *:</label>
                             <input type=\"file\" name=\"fileToUpload\" id=\"fileToUpload\" class='form-control rounded-0 text' required>
                        </div>
                     
                    </div>
                    <div class=\"row\">
                        <div class=\"col-md-6 p-3\">
                            <label>Color* :</label>
                            <input type=\"color\" value='' name='color' required class=\"form-control pt-3 pb-4 rounded-0\">
                        </div>
                     
                    </div>
                     <div class='row'>
                        <div class=\"col-md\">
                            <label>Car Description :</label>
                            <textarea class=\"form-control rounded-0\"name=\"carDesc\" required placeholder=\"Short Description of the vehicle\"></textarea>
                        </div>
                     </div>
                        
                       
                         <br>
                        <input type=\"submit\" name=\"insertBtn\" value=\"Insert\"  class=\"btn btn-primary rounded-0 setMidHorizontal\">
                        <br>

                        <br>
                    </div>

                </form>";


?>