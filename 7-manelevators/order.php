<?php include 'header.php'; ?> 
            

<div class="order">
    <div class="container">
        <div class="row">
            <h3 class="title"><span></span> اطلب المنتج</h3>
            
            <div class="part">
            <h4>المصاعد</h4>
            <table>
                <tr>
                    <th>نوع المصاعد</th>
                    <td><select name="" id="">
                        <option value="">هيدروليك</option>
                        <option value="">مصعد ركاب</option>
                        <option value="">مصعد طعام</option>
                        <option value="">بضائع</option>
                        <option value="">مصعد مرضى</option>
                    </select></td>
                </tr>
                
                <tr>
                    <th> مستورد بالكامل <input type="checkbox"></th>
                </tr>
                
                <tr>
                    <th>عدد الادوار</th>
                    <td> من <select name="" id="">
                        <option value="">الجراح</option>                        
                        <?php 
                            for ($i=1; $i <= 40 ; $i++) { 
                                echo "<option> الدور " . $i .  " </option>";
		                  }
	                    ?>

                    </select> 
                    
                    الى <select name="" id="">
                       <?php 
                            for ($i=1; $i <= 40 ; $i++) { 
                                echo "<option> الدور " . $i .  " </option>";
		                  }
	                    ?>
                    </select>
                    </td>
                    
                </tr>
                 
                <tr>
                    <th>عدد الادوار الغير مزوده بأبواب</th>
                    <td><select name="" id="">
                        <option value="">1</option>
                        <option value="">2</option>
                        <option value="">3</option>
                        <option value="">4</option>
                        <option value="">5</option>
                        <option value="">6</option>
                        <option value="">7</option>
                        <option value="">8</option>
                        <option value="">9</option>
                        <option value="">10</option>
                    </select></td>
                </tr>
                
                <tr>
                    <th>عدد الابواب بالمصعد</th>
                    <td> 10 ادوار</td>
                </tr>
                
                <tr>
                    <th>نوع الابواب </th>
                    <td><select name="" id="">
                        <option value="">بدون باب داخلى + باب خارجى يدوى</option>
                        <option value="">باب داخلى يدوى + باب خارجى يدوى</option>
                        <option value="">باب داخلى اوتوماتيك + باب خارجى يدوى</option>
                        <option value="">باب داخلى اوتوماتيك + باب خارجى اوتوماتيك</option>
                    </select></td>
                </tr>
                <tr>
                    <th>الباب الخارجى استانلس <input type="checkbox"></th>
                    <th>الباب الداخلى استانلس <input type="checkbox"></th>
                </tr>
                
                <tr>
                    <th>نوع ماتور الجر </th>
                    <td><select name="" id="">
                        <option value="">ايطالى</option>
                        <option value="">تركى</option>
                        <option value="">المانى</option>
                    </select></td>
                </tr>
                
                <tr>
                    <th>ديكورات كابينه المصعد </th>
                    <td><select name="" id="">
                        <option value="">مستورد بالكامل</option>
                        <option value="">محلى استانليس</option>
                        <option value="">محلى خشب HDF</option>
                    </select></td>
                </tr>
                
                <tr>
                    <th style="color:red">خيارات</th>
                </tr>
               
               <tr>
                   <td><input type="checkbox"> جهاز السرعة المتميز (VVVF)</td>
               </tr>
               
               <tr><td><input type="checkbox"> جهاز إنذار ضد الحمولة الزائدة</td></tr>
               
               <tr><td><input type="checkbox"> جهاز صوتي للأدوار</td></tr>
               
               <tr><td><input type="checkbox"> لوحة طلبات داخلية مستوردة</td></tr>
               
               <tr>
                   <th style="color:red; font-size:18px; padding-top:20px;">السلالم</th>
               </tr>
               
               <tr><td><input type="checkbox">سلالم متحركة</td></tr>
               <tr><td><input type="checkbox"> مشايات متحركة</td></tr>
               
            </table>
            </div>
            
            <div class="part">
            <h4>البيانات الشخصية</h4>
            <table>
 
                <tr>
                    <th>الاسم <span style="color:red">*</span>&nbsp;:</th>
                    <td><input type="text" class="input-sm" style="border-radius:5px;"></td>
                </tr>
                
                <tr>
                    <th>العنوان &nbsp;:</th>
                    <td><input type="text" class="input-sm" style="border-radius:5px;"></td>
                </tr>
                
                <tr>
                    <th>كود البريد &nbsp;:</th>
                    <td><input type="text" class="input-sm" style="border-radius:5px;"></td>
                </tr>
                
                <tr>
                    <th>تليفون &nbsp;:</th>
                    <td><input type="text" class="input-sm" style="border-radius:5px;"></td>
                </tr>
                
                <tr>
                    <th>فاكس&nbsp;:</th>
                    <td><input type="text" class="input-sm" style="border-radius:5px;"></td>
                </tr>
                
                <tr>
                    <th>الموقع الاكترونى&nbsp;:</th>
                    <td><input type="text" class="input-sm" style="border-radius:5px;"></td>
                </tr>
                
                <tr>
                    <th>البريد الاكترونى <span style="color:red">*</span>&nbsp;:</th>
                    <td><input type="text" class="input-sm" style="border-radius:5px;"></td>
                </tr>
                
                <tr>
                    <th>اضافات اخرى :</th>
                    <td><input type="text" class="input-lg"></td>
                </tr>
            
                <tr>
                    <th>الرسالة :</th>
                    <td><textarea name="" id="" rows="4" class="form-control "></textarea></td>
                </tr>

                <tr>
                    <th>رفع تصميم محدد:</th>
                    <td><input type="file"></td>
                </tr>
                
                <tr>
                   <th><button class="btn btn-danger" style="border-radius:5px;">طلب</button></th> 
                </tr>
            </table>
            </div>
        </div>
    </div>
</div>








<?php include 'footer.php'; ?> 