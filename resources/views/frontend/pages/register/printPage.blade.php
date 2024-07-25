<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap">
    <title>SSO</title>
</head>
<style>

</style>

<body>

    <div class="invoice-wrapper"
    style="width: 100%; margin: 0 auto;background: #FFF;">
   <div class="header-wrapper" style="background-image: url({{ asset('frontend/assets/images/invoice-header-bg.png') }});padding:15px 40px;background-repeat: no-repeat;
background-size: cover;">
    <table style="width:100%">

        <tr>
          <td  style="width:30%;">
            <div class="logo">
                <img   style="width: 150px;"  src="{{ uploadedAsset($website_logo) }}">
            </div>
          </td>
          <td style="width: 70%;">   <div class="Heading-wrap">
            <h2 style="  color: #000;
                    font-family: Poppins;
                    font-size: 20px;
                    font-weight: 500;
                    line-height: 1.3;
                    text-transform: uppercase; margin: 0; ">{{ $institute->name }}</h2>
            <h3 style="color: #000;
                    font-family: Poppins;
                    font-size: 14px;
                    font-style: normal;
                    font-weight: 400;
                    line-height: normal; margin: 0;">IN Association with School Sports Olympia</h3>
        </div></td>
        </tr>
      </table>
   </div>
   
   <div class="invoice-inner" style="padding:15px 40px;">
        <h4 style="color: #000;
                font-family: Poppins;
                font-size: 18px;
                font-style: normal;
                font-weight: 400;
                line-height: normal;
                text-transform: uppercase; margin-top: 0; margin-bottom: 10px;">Registration Form</h4>
        <p style="color: #000;
        font-family: Poppins;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;margin-top: 0px; margin-bottom: 8px;">School Sports Olympia Registration Form: Enroll Your Champion
            Today</p>
        <p style="color: #000;
      font-family: Poppins;
      font-size: 16px;
      font-style: normal;
      font-weight: 400;
      line-height: normal;margin-top: 0px;  margin-bottom: 8px;">Dear Parent/Guardian,</p>
        <p style="color: #000;
        font-family: Poppins;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: normal; margin-top: 0px;  margin-bottom: 8px;">We are excited to inform you about the upcoming Sports Olympiad
            organized by <b>School Sports Olympia (SSO).</b>
            As your child, <span style="color: #EF3B3F;">[Child's Name]</span>, has expressed interest in
            participating in this event, we kindly request
            your consent to allow him/her to take part.</p>
        <p style="color: #000;
            font-family: Poppins;
            font-size: 16px;
            font-style: normal;
            font-weight: 400;
            line-height: normal; margin-bottom:8px;">Please carefully read and fill out the following information:
        </p>

      
              
            <div class="sso-bg-wrap">
             
              <div class="form-wrap">
                <p style="color: #000;
           font-family: Poppins;
           font-size: 16px;
           font-style: normal;
           font-weight: 400;
           line-height: normal; margin-bottom:8px; ">Child's Information:</p>
             
                    <ul style="margin: 10px 0;">
                        <li style="margin-bottom: 5px;">
                                <label style="color: #000;
                            font-family: Poppins;
                            font-size: 14px;
                            font-style: normal;
                            font-weight: 400;
                            width:15%;
                            line-height: normal; 
                            display: inline-block;">Full Name: </label>
                            <div style="border: 0;
                            background: transparent;
                            border-bottom: 1px solid rgba(0, 0, 0, 0.50);
                            height: 25px;
                            width: 84%;
                            display: inline-block;"></div>
                         
                        </li>
                        <li style="margin-bottom: 5px;">
                            <label style="color: #000;
                            font-family: Poppins;
                            font-size: 14px;
                            font-style: normal;
                            font-weight: 400;
                            width:15%;
                            line-height: normal; 
                            display: inline-block;">Date of Birth:  </label>
                           
<div style="border: 0;     width: 80%;
background: transparent;
border-bottom: 1px solid rgba(0, 0, 0, 0.50);
height: 25px;
display: inline-block;"></div></li>
                     <li style="margin-bottom: 5px;">
                        <label style="color: #000;
                            font-family: Poppins;
                            font-size: 14px;
                            font-style: normal;
                            font-weight: 400;
                            width: 30%;
                            line-height: normal;">Child's Grade/Class: </label> 
                             <div style="border: 0;
                                height: 25px;
                                width: 74%;
                            background: transparent;
                            border-bottom: 1px solid rgba(0, 0, 0, 0.50);
                            height: 25px;
                            display: inline-block;"></div></li>
                       <li style="margin-bottom: 5px;"><label style="color: #000;
                            font-family: Poppins;
                            font-size: 14px;
                            font-style: normal;
                            font-weight: 400;
                            width: 20%;
                            line-height: normal;">Email Address: </label>   
                            <div style="border: 0;
                            background: transparent;
                            border-bottom: 1px solid rgba(0, 0, 0, 0.50);
                            height: 25px; width: 76%;
                            display: inline-block;"></div></li>
                    </ul>
                    <p style="color: #000;
                    font-family: Poppins;
                    font-size: 16px;
                    font-style: normal;
                    font-weight: 400;
                    line-height: normal;margin-bottom:10px;  padding-top: 0;">Guardian Information:</p>
            </div>
           
              
            <ul style="margin: 10px 0;">
                        <li style="margin-bottom: 5px;">
                            <label style="color: #000;
                        font-family: Poppins;
                        font-size: 14px;
                        font-style: normal;
                        font-weight: 400;
                        width:20%;
                        line-height: normal; 
                        display: inline-block;">Full Name: </label>
                        <div style="border: 0;
                        background: transparent;
                        border-bottom: 1px solid rgba(0, 0, 0, 0.50);
                        height: 25px;
                        width: 79%;
                        display: inline-block;"></div>
                     
                    </li>
                         <li style="margin-bottom: 5px;"><label style="color: #000;
                             font-family: Poppins;
                             font-size: 14px;width: 30%;
                             font-style: normal;
                             font-weight: 400;
                             line-height: normal;">Relationship with Child: </label>  <div style="border: 0;
                            background: transparent;
                            border-bottom: 1px solid rgba(0, 0, 0, 0.50);
                            height: 25px;  width: 62%;
                            display: inline-block;"></div></li>
                       <li style="margin-bottom: 15px;"><label style="color: #000;
                             font-family: Poppins;
                             font-size: 14px;
                             font-style: normal;    
                             font-weight: 400;width: 20%;
                             line-height: normal;">Contact Number: </label>  <div style="border: 0;
                            background: transparent;
                            border-bottom: 1px solid rgba(0, 0, 0, 0.50);
                            height: 25px;width: 72%;
                            display: inline-block;"></div></li>
                      
                     </ul>

                     <p style="color: #000;
                     font-family: Poppins;
                     font-size: 16px;
                     font-style: normal;
                     font-weight: 400;
                     line-height: normal;    margin-bottom: 10px;
                     margin-top: 10px;">I, the undersigned, declare that all the information provided in this registration form is accurate and complete to the best of my knowledge. Hereby I grant permission for my child, [Child's Name], to participate in the School Sports Olymia (SSO).</p>
       <div class="column-wrapper" >
        <table style="width:100%">

            <tr>
                <td style="width: 50%;">   <div class="col-left">
                <h6 style="color: #000; font-family: Poppins; font-size: 16px; font-style: normal; font-weight: 400; line-height: normal; margin: 0; display: inline-block;">Date: </h6>
                <div style="display: inline-block; width: 150px; border-bottom: 1px solid rgba(0, 0, 0, 0.50);"></div>
           
            </div></td>
              <td style="width: 50%;">           <div class="col-right" style="margin-left: auto; width: 150px;">
                <div style="display: block; margin-left: auto;  border-bottom: 1px solid rgba(0, 0, 0, 0.50);"></div>
    <h6 style="color: #000; font-family:Poppins; font-size: 16px; font-style: normal; font-weight: 400; line-height: normal; margin: 0; display: inline-block; width: 150px; text-align: center;  ">Signature: </h6>
</div></td>
            </tr>
          </table>
       
       
    </div>
  <div>
 
</div>

    
        </div>
    </div>
</div>

</body>

</html>