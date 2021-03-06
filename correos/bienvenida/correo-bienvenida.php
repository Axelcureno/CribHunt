<?php 

$mensaje = <<<EOD
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    	<!-- NAME: COLORFIELD -->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bienvenid@ a CribHunt</title>
        
    <style type="text/css">
		body,#bodyTable,#bodyCell{
			height:100% !important;
			margin:0;
			padding:0;
			width:100% !important;
		}
		table{
			border-collapse:collapse;
		}
		img,a img{
			border:0;
			outline:none;
			text-decoration:none;
		}
		h1,h2,h3,h4,h5,h6{
			margin:0;
			padding:0;
		}
		p{
			margin:1em 0;
			padding:0;
		}
		a{
			word-wrap:break-word;
		}
		.ReadMsgBody{
			width:100%;
		}
		.ExternalClass{
			width:100%;
		}
		.ExternalClass,.ExternalClass p,.ExternalClass span,.ExternalClass font,.ExternalClass td,.ExternalClass div{
			line-height:100%;
		}
		table,td{
			mso-table-lspace:0pt;
			mso-table-rspace:0pt;
		}
		#outlook a{
			padding:0;
		}
		img{
			-ms-interpolation-mode:bicubic;
		}
		body,table,td,p,a,li,blockquote{
			-ms-text-size-adjust:100%;
			-webkit-text-size-adjust:100%;
		}
		.mcnImage{
			vertical-align:bottom;
		}
		.mcnTextContent img{
			height:auto !important;
		}
		a.mcnButton{
			display:block;
		}
	/*
	@tab Page
	@section background style
	@tip Set the background color and top border for your email. You may want to choose colors that match your company's branding.
	*/
		body,#bodyTable{
			/*@editable*/background-color:#3f51b5;
		}
	/*
	@tab Page
	@section background style
	@tip Set the background color and top border for your email. You may want to choose colors that match your company's branding.
	*/
		#bodyCell{
			/*@editable*/border-top:10px solid #3F3F38;
		}
	/*
	@tab Page
	@section email border
	@tip Set the border for your email.
	*/
		#templateContainer{
			/*@editable*/border:0;
		}
	/*
	@tab Page
	@section heading 1
	@tip Set the styling for all first-level headings in your emails. These should be the largest of your headings.
	@style heading 1
	*/
		h1{
			/*@editable*/color:#FFFFFF !important;
			display:block;
			/*@editable*/font-family:Georgia;
			/*@editable*/font-size:50px;
			/*@editable*/font-style:normal;
			/*@editable*/font-weight:normal;
			/*@editable*/line-height:100%;
			/*@editable*/letter-spacing:-1px;
			margin:0;
			/*@editable*/text-align:left;
		}
	/*
	@tab Page
	@section heading 2
	@tip Set the styling for all second-level headings in your emails.
	@style heading 2
	*/
		h2{
			/*@editable*/color:#3F3F38 !important;
			display:block;
			/*@editable*/font-family:"Lucida Grande";
			/*@editable*/font-size:17px;
			/*@editable*/font-style:normal;
			/*@editable*/font-weight:normal;
			/*@editable*/line-height:125%;
			/*@editable*/letter-spacing:-.75px;
			margin:0;
			/*@editable*/text-align:left;
		}
	/*
	@tab Page
	@section heading 3
	@tip Set the styling for all third-level headings in your emails.
	@style heading 3
	*/
		h3{
			/*@editable*/color:#3F3F38 !important;
			display:block;
			/*@editable*/font-family:Helvetica;
			/*@editable*/font-size:14px;
			/*@editable*/font-style:italic;
			/*@editable*/font-weight:normal;
			/*@editable*/line-height:125%;
			/*@editable*/letter-spacing:-.5px;
			margin:0;
			/*@editable*/text-align:left;
		}
	/*
	@tab Page
	@section heading 4
	@tip Set the styling for all fourth-level headings in your emails. These should be the smallest of your headings.
	@style heading 4
	*/
		h4{
			/*@editable*/color:#3F3F38 !important;
			display:block;
			/*@editable*/font-family:"Trebuchet MS";
			/*@editable*/font-size:10px;
			/*@editable*/font-style:normal;
			/*@editable*/font-weight:bold;
			/*@editable*/line-height:125%;
			/*@editable*/letter-spacing:normal;
			margin:0;
			/*@editable*/text-align:left;
		}
	/*
	@tab Preheader
	@section preheader style
	@tip Set the background color and borders for your email's preheader area.
	*/
		#templatePreheader{
			/*@editable*/background-color:#ff5722;
			/*@editable*/border-top:0;
			/*@editable*/border-bottom:0;
		}
	/*
	@tab Preheader
	@section preheader text
	@tip Set the styling for your email's preheader text. Choose a size and color that is easy to read.
	*/
		.preheaderContainer .mcnTextContent,.preheaderContainer .mcnTextContent p{
			/*@editable*/color:#3F3F38;
			/*@editable*/font-family:Verdana;
			/*@editable*/font-size:10px;
			/*@editable*/line-height:125%;
			/*@editable*/text-align:left;
		}
	/*
	@tab Preheader
	@section preheader link
	@tip Set the styling for your email's header links. Choose a color that helps them stand out from your text.
	*/
		.preheaderContainer .mcnTextContent a{
			/*@editable*/color:#FFFFFF;
			/*@editable*/font-weight:normal;
			/*@editable*/text-decoration:underline;
		}
	/*
	@tab Header
	@section header style
	@tip Set the background color and borders for your email's header area.
	*/
		#templateHeader{
			/*@editable*/background-color:#ff5722;
			/*@editable*/border-top:0;
			/*@editable*/border-bottom:0;
		}
	/*
	@tab Header
	@section header text
	@tip Set the styling for your email's header text. Choose a size and color that is easy to read.
	*/
		.headerContainer .mcnTextContent,.headerContainer .mcnTextContent p{
			/*@editable*/color:#3F3F38;
			/*@editable*/font-family:Georgia;
			/*@editable*/font-size:16px;
			/*@editable*/line-height:150%;
			/*@editable*/text-align:left;
		}
	/*
	@tab Header
	@section header link
	@tip Set the styling for your email's header links. Choose a color that helps them stand out from your text.
	*/
		.headerContainer .mcnTextContent a{
			/*@editable*/color:#3F3F38;
			/*@editable*/font-weight:normal;
			/*@editable*/text-decoration:underline;
		}
	/*
	@tab Body
	@section body style
	@tip Set the background color and borders for your email's body area.
	*/
		#templateBody{
			/*@editable*/background-color:#ffffff;
			/*@editable*/border-top:0;
			/*@editable*/border-bottom:0;
		}
	/*
	@tab Body
	@section body text
	@tip Set the styling for your email's body text. Choose a size and color that is easy to read.
	*/
		.bodyContainer .mcnTextContent,.bodyContainer .mcnTextContent p{
			/*@editable*/color:#3F3F38;
			/*@editable*/font-family:Georgia;
			/*@editable*/font-size:16px;
			/*@editable*/line-height:150%;
			/*@editable*/text-align:left;
		}
	/*
	@tab Body
	@section body link
	@tip Set the styling for your email's body links. Choose a color that helps them stand out from your text.
	*/
		.bodyContainer .mcnTextContent a{
			/*@editable*/color:#3F3F38;
			/*@editable*/font-weight:normal;
			/*@editable*/text-decoration:underline;
		}
	/*
	@tab Columns
	@section column style
	@tip Set the background color and borders for your email's columns area.
	*/
		#templateColumns{
			/*@editable*/background-color:#3f51b5;
			/*@editable*/border-top:0;
			/*@editable*/border-bottom:0;
		}
	/*
	@tab Columns
	@section left column text
	@tip Set the styling for your email's left column text. Choose a size and color that is easy to read.
	*/
		.leftColumnContainer .mcnTextContent,.leftColumnContainer .mcnTextContent p{
			/*@editable*/color:#3F3F38;
			/*@editable*/font-family:Georgia;
			/*@editable*/font-size:16px;
			/*@editable*/line-height:150%;
			/*@editable*/text-align:left;
		}
	/*
	@tab Columns
	@section left column link
	@tip Set the styling for your email's left column links. Choose a color that helps them stand out from your text.
	*/
		.leftColumnContainer .mcnTextContent a{
			/*@editable*/color:#3F3F38;
			/*@editable*/font-weight:normal;
			/*@editable*/text-decoration:underline;
		}
	/*
	@tab Columns
	@section right column text
	@tip Set the styling for your email's right column text. Choose a size and color that is easy to read.
	*/
		.rightColumnContainer .mcnTextContent,.rightColumnContainer .mcnTextContent p{
			/*@editable*/color:#3F3F38;
			/*@editable*/font-family:Georgia;
			/*@editable*/font-size:16px;
			/*@editable*/line-height:150%;
			/*@editable*/text-align:left;
		}
	/*
	@tab Columns
	@section right column link
	@tip Set the styling for your email's right column links. Choose a color that helps them stand out from your text.
	*/
		.rightColumnContainer .mcnTextContent a{
			/*@editable*/color:#3F3F38;
			/*@editable*/font-weight:normal;
			/*@editable*/text-decoration:underline;
		}
	/*
	@tab Footer
	@section footer style
	@tip Set the background color and borders for your email's footer area.
	*/
		#templateFooter{
			/*@editable*/background-color:#3f51b5;
			/*@editable*/border-top:0;
			/*@editable*/border-bottom:0;
		}
	/*
	@tab Footer
	@section footer text
	@tip Set the styling for your email's footer text. Choose a size and color that is easy to read.
	*/
		.footerContainer .mcnTextContent,.footerContainer .mcnTextContent p{
			/*@editable*/color:#ff5722;
			/*@editable*/font-family:Verdana;
			/*@editable*/font-size:10px;
			/*@editable*/line-height:125%;
			/*@editable*/text-align:left;
		}
	/*
	@tab Footer
	@section footer link
	@tip Set the styling for your email's footer links. Choose a color that helps them stand out from your text.
	*/
		.footerContainer .mcnTextContent a{
			/*@editable*/color:#FFFFFF;
			/*@editable*/font-weight:normal;
			/*@editable*/text-decoration:underline;
		}
	@media only screen and (max-width: 480px){
		body,table,td,p,a,li,blockquote{
			-webkit-text-size-adjust:none !important;
		}

}	@media only screen and (max-width: 480px){
		body{
			width:100% !important;
			min-width:100% !important;
		}

}	@media only screen and (max-width: 480px){
		table[class=mcnTextContentContainer]{
			width:100% !important;
		}

}	@media only screen and (max-width: 480px){
		table[class=mcnBoxedTextContentContainer]{
			width:100% !important;
		}

}	@media only screen and (max-width: 480px){
		table[class=mcpreview-image-uploader]{
			width:100% !important;
			display:none !important;
		}

}	@media only screen and (max-width: 480px){
		img[class=mcnImage]{
			width:100% !important;
		}

}	@media only screen and (max-width: 480px){
		table[class=mcnImageGroupContentContainer]{
			width:100% !important;
		}

}	@media only screen and (max-width: 480px){
		td[class=mcnImageGroupContent]{
			padding:9px !important;
		}

}	@media only screen and (max-width: 480px){
		td[class=mcnImageGroupBlockInner]{
			padding-bottom:0 !important;
			padding-top:0 !important;
		}

}	@media only screen and (max-width: 480px){
		tbody[class=mcnImageGroupBlockOuter]{
			padding-bottom:9px !important;
			padding-top:9px !important;
		}

}	@media only screen and (max-width: 480px){
		table[class=mcnCaptionTopContent],table[class=mcnCaptionBottomContent]{
			width:100% !important;
		}

}	@media only screen and (max-width: 480px){
		table[class=mcnCaptionLeftTextContentContainer],table[class=mcnCaptionRightTextContentContainer],table[class=mcnCaptionLeftImageContentContainer],table[class=mcnCaptionRightImageContentContainer],table[class=mcnImageCardLeftTextContentContainer],table[class=mcnImageCardRightTextContentContainer]{
			width:100% !important;
		}

}	@media only screen and (max-width: 480px){
		td[class=mcnImageCardLeftImageContent],td[class=mcnImageCardRightImageContent]{
			padding-right:18px !important;
			padding-left:18px !important;
			padding-bottom:0 !important;
		}

}	@media only screen and (max-width: 480px){
		td[class=mcnImageCardBottomImageContent]{
			padding-bottom:9px !important;
		}

}	@media only screen and (max-width: 480px){
		td[class=mcnImageCardTopImageContent]{
			padding-top:18px !important;
		}

}	@media only screen and (max-width: 480px){
		table[class=mcnCaptionLeftContentOuter] td[class=mcnTextContent],table[class=mcnCaptionRightContentOuter] td[class=mcnTextContent]{
			padding-top:9px !important;
		}

}	@media only screen and (max-width: 480px){
		td[class=mcnCaptionBlockInner] table[class=mcnCaptionTopContent]:last-child td[class=mcnTextContent]{
			padding-top:18px !important;
		}

}	@media only screen and (max-width: 480px){
		td[class=mcnBoxedTextContentColumn]{
			padding-left:18px !important;
			padding-right:18px !important;
		}

}	@media only screen and (max-width: 480px){
		td[class=columnsContainer]{
			display:block !important;
			max-width:600px !important;
			width:100% !important;
		}

}	@media only screen and (max-width: 480px){
		td[class=mcnTextContent]{
			padding-right:18px !important;
			padding-left:18px !important;
		}

}	@media only screen and (max-width: 480px){
	/*
	@tab Mobile Styles
	@section template width
	@tip Make the template fluid for portrait or landscape view adaptability. If a fluid layout doesn't work for you, set the width to 300px instead.
	*/
		table[id=templateContainer],table[id=templatePreheader],table[id=templateHeader],table[id=templateColumns],table[class=templateColumn],table[id=templateBody],table[id=templateFooter]{
			/*@tab Mobile Styles
@section template width
@tip Make the template fluid for portrait or landscape view adaptability. If a fluid layout doesn't work for you, set the width to 300px instead.*/max-width:600px !important;
			/*@editable*/width:100% !important;
		}

}	@media only screen and (max-width: 480px){
	/*
	@tab Mobile Styles
	@section heading 1
	@tip Make the first-level headings larger in size for better readability on small screens.
	*/
		h1{
			/*@editable*/font-size:34px !important;
			/*@editable*/line-height:125% !important;
		}

}	@media only screen and (max-width: 480px){
	/*
	@tab Mobile Styles
	@section heading 2
	@tip Make the second-level headings larger in size for better readability on small screens.
	*/
		h2{
			/*@editable*/font-size:16px !important;
			/*@editable*/line-height:125% !important;
		}

}	@media only screen and (max-width: 480px){
	/*
	@tab Mobile Styles
	@section heading 3
	@tip Make the third-level headings larger in size for better readability on small screens.
	*/
		h3{
			/*@editable*/font-size:14px !important;
			/*@editable*/line-height:125% !important;
		}

}	@media only screen and (max-width: 480px){
	/*
	@tab Mobile Styles
	@section heading 4
	@tip Make the fourth-level headings larger in size for better readability on small screens.
	*/
		h4{
			/*@editable*/font-size:12px !important;
			/*@editable*/line-height:125% !important;
		}

}	@media only screen and (max-width: 480px){
	/*
	@tab Mobile Styles
	@section Boxed Text
	@tip Make the boxed text larger in size for better readability on small screens. We recommend a font size of at least 16px.
	*/
		table[class=mcnBoxedTextContentContainer] td[class=mcnTextContent],td[class=mcnBoxedTextContentContainer] td[class=mcnTextContent] p{
			/*@editable*/font-size:18px !important;
			/*@editable*/line-height:125% !important;
		}

}	@media only screen and (max-width: 480px){
	/*
	@tab Mobile Styles
	@section Preheader Visibility
	@tip Set the visibility of the email's preheader on small screens. You can hide it to save space.
	*/
		table[id=templatePreheader]{
			/*@editable*/display:block !important;
		}

}	@media only screen and (max-width: 480px){
	/*
	@tab Mobile Styles
	@section Preheader Text
	@tip Make the preheader text larger in size for better readability on small screens.
	*/
		td[class=preheaderContainer] td[class=mcnTextContent],td[class=preheaderContainer] td[class=mcnTextContent] p{
			/*@editable*/font-size:14px !important;
			/*@editable*/line-height:115% !important;
		}

}	@media only screen and (max-width: 480px){
	/*
	@tab Mobile Styles
	@section Header Text
	@tip Make the header text larger in size for better readability on small screens.
	*/
		td[class=headerContainer] td[class=mcnTextContent],td[class=headerContainer] td[class=mcnTextContent] p{
			/*@editable*/font-size:18px !important;
			/*@editable*/line-height:125% !important;
		}

}	@media only screen and (max-width: 480px){
	/*
	@tab Mobile Styles
	@section Body Text
	@tip Make the body text larger in size for better readability on small screens. We recommend a font size of at least 16px.
	*/
		td[class=bodyContainer] td[class=mcnTextContent],td[class=bodyContainer] td[class=mcnTextContent] p{
			/*@editable*/font-size:18px !important;
			/*@editable*/line-height:125% !important;
		}

}	@media only screen and (max-width: 480px){
	/*
	@tab Mobile Styles
	@section Left Column Text
	@tip Make the left column text larger in size for better readability on small screens. We recommend a font size of at least 16px.
	*/
		td[class=leftColumnContainer] td[class=mcnTextContent],td[class=leftColumnContainer] td[class=mcnTextContent] p{
			/*@editable*/font-size:18px !important;
			/*@editable*/line-height:125% !important;
		}

}	@media only screen and (max-width: 480px){
	/*
	@tab Mobile Styles
	@section Right Column Text
	@tip Make the right column text larger in size for better readability on small screens. We recommend a font size of at least 16px.
	*/
		td[class=rightColumnContainer] td[class=mcnTextContent],td[class=rightColumnContainer] td[class=mcnTextContent] p{
			/*@editable*/font-size:18px !important;
			/*@editable*/line-height:125% !important;
		}

}	@media only screen and (max-width: 480px){
	/*
	@tab Mobile Styles
	@section footer text
	@tip Make the body content text larger in size for better readability on small screens.
	*/
		td[class=footerContainer] td[class=mcnTextContent],td[class=footerContainer] td[class=mcnTextContent] p{
			/*@editable*/font-size:14px !important;
			/*@editable*/line-height:115% !important;
		}

}	@media only screen and (max-width: 480px){
		td[class=footerContainer] a[class=utilityLink]{
			display:block !important;
		}

}</style></head>
    <body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">
        <center>
            <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
                <tr>
                    <td align="center" valign="top" id="bodyCell">
                        <!-- BEGIN TEMPLATE // -->
                        <table border="0" cellpadding="0" cellspacing="0" width="600" id="templateContainer">
                            <tr>
                                <td align="center" valign="top">
                                    <!-- BEGIN PREHEADER // -->
                                    <table border="0" cellpadding="0" cellspacing="0" width="600" id="templatePreheader">
                                        <tr>
                                        	<td valign="top" class="preheaderContainer"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock">
    <tbody class="mcnTextBlockOuter">
        <tr>
            <td valign="top" class="mcnTextBlockInner">
                
                <table align="left" border="0" cellpadding="0" cellspacing="0" width="366" class="mcnTextContentContainer">
                    <tbody><tr>
                        
                        <td valign="top" class="mcnTextContent" style="padding-top:9px; padding-left:18px; padding-bottom:9px; padding-right:0;">
                        
                            <span style="color:#FFFFFF">Bienvenid@ a CribHunt</span>
                        </td>
                    </tr>
                </tbody></table>
                
                <table align="right" border="0" cellpadding="0" cellspacing="0" width="197" class="mcnTextContentContainer">
                    <tbody><tr>
                        
                        <td valign="top" class="mcnTextContent" style="padding-top:9px; padding-right:18px; padding-bottom:9px; padding-left:0;">
                        
                            <a href="*|ARCHIVE|*" target="_blank">View this email in your browser</a>
                        </td>
                    </tr>
                </tbody></table>
                
            </td>
        </tr>
    </tbody>
</table></td>
                                        </tr>
                                    </table>
                                    <!-- // END PREHEADER -->
                                </td>
                            </tr>
                            <tr>
                                <td align="center" valign="top">
                                    <!-- BEGIN HEADER // -->
                                    <table border="0" cellpadding="0" cellspacing="0" width="600" id="templateHeader">
                                        <tr>
                                            <td valign="top" class="headerContainer"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnImageCardBlock">
    <tbody class="mcnImageCardBlockOuter">
        <tr>
            <td class="mcnImageCardBlockInner" valign="top" style="padding-top:9px; padding-right:18px; padding-bottom:9px; padding-left:18px;">
                
<table border="0" cellpadding="0" cellspacing="0" class="mcnImageCardLeftContentOuter" width="100%">
    <tbody><tr>
        <td valign="top" class="mcnImageCardLeftContentInner" style="padding: 0px;background-color: #FF5722;">
            <table align="right" border="0" cellpadding="0" cellspacing="0" class="mcnImageCardLeftImageContentContainer">
                <tbody><tr>
                    <td class="mcnImageCardLeftImageContent" valign="top" style="padding-top:18px; padding-right:18px; padding-bottom:18px; padding-left:0;">
                    
                        
                        <img alt="" src="https://gallery.mailchimp.com/1ae6c4318c8d36dc812b9d9fd/images/96bc06c3-1758-480d-9b78-fcc43503ed05.png" width="176" style="max-width:417px;" class="mcnImage">
                        
                    
                    </td>
                </tr>
            </tbody></table>
            <table class="mcnImageCardLeftTextContentContainer" align="left" border="0" cellpadding="0" cellspacing="0" width="352">
                <tbody><tr>
                    <td valign="top" class="mcnTextContent" style="padding-left: 18px;padding-top: 18px;padding-bottom: 18px;color: #3F3F38;font-family: Georgia;font-size: 14px;font-style: italic;font-weight: normal;text-align: left;">
                        
                    </td>
                </tr>
            </tbody></table>
        </td>
    </tr>
</tbody></table>




            </td>
        </tr>
    </tbody>
</table></td>
                                        </tr>
                                    </table>
                                    <!-- // END HEADER -->
                                </td>
                            </tr>
                            <tr>
                                <td align="center" valign="top">
                                    <!-- BEGIN BODY // -->
                                    <table border="0" cellpadding="0" cellspacing="0" width="600" id="templateBody">
                                        <tr>
                                            <td valign="top" class="bodyContainer"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock">
    <tbody class="mcnTextBlockOuter">
        <tr>
            <td valign="top" class="mcnTextBlockInner">
                
                <table align="left" border="0" cellpadding="0" cellspacing="0" width="600" class="mcnTextContentContainer">
                    <tbody><tr>
                        
                        <td valign="top" class="mcnTextContent" style="padding: 9px 18px; line-height: 200%;">
                        
                            <h4>&nbsp;</h4>

<h1 class="null" style="text-align: left;"><span style="font-size:32px"><span style="color:#3F51B5"><strong><span style="font-family:arial,helvetica neue,helvetica,sans-serif">Bienvenid@&nbsp;a CribHunt</span></strong></span></span></h1>

                        </td>
                    </tr>
                </tbody></table>
                
            </td>
        </tr>
    </tbody>
</table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock">
    <tbody class="mcnTextBlockOuter">
        <tr>
            <td valign="top" class="mcnTextBlockInner">
                
                <table align="left" border="0" cellpadding="0" cellspacing="0" width="600" class="mcnTextContentContainer">
                    <tbody><tr>
                        
                        <td valign="top" class="mcnTextContent" style="padding-top:9px; padding-right: 18px; padding-bottom: 9px; padding-left: 18px;">
                        
                            
                        </td>
                    </tr>
                </tbody></table>
                
            </td>
        </tr>
    </tbody>
</table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock">
    <tbody class="mcnTextBlockOuter">
        <tr>
            <td valign="top" class="mcnTextBlockInner">
                
                <table align="left" border="0" cellpadding="0" cellspacing="0" width="600" class="mcnTextContentContainer">
                    <tbody><tr>
                        
                        <td valign="top" class="mcnTextContent" style="padding-top:9px; padding-right: 18px; padding-bottom: 9px; padding-left: 18px;">
                        
                            <span style="color: #606060;font-family: helvetica;font-size: 15px;line-height: 22.5px;">Hola $nombres, mi nombre es Axel Cureño y soy el creador de CribHunt, la plataforma web para enlazar a los que ofrecen opciones para vivir con aquellos que las buscan. Todo esto de manera cómoda, rápida y sencilla.</span><br style="color: #606060;font-family: Helvetica;font-size: 15px;line-height: 22.5px;">
<br style="color: #606060;font-family: Helvetica;font-size: 15px;line-height: 22.5px;">
<span style="color: #606060;font-family: helvetica;font-size: 15px;line-height: 22.5px;">Antes que nada quiero darte la bienvenida, es un gusto tenerte como un usuario registrado y te platico algunos de los beneficios de ser usuario registrado:</span><br style="color: #606060;font-family: Helvetica;font-size: 15px;line-height: 22.5px;">
&nbsp;
<ul style="color: #606060;font-family: Helvetica;font-size: 15px;line-height: 22.5px;">
	<li>Publicar hasta Cribs (propiedades) para anunciarlas en el la plataforma y sean vistas por todos los usuarios que accesan con o sin cuenta.</li>
	<li>Administrar estas propiedades, ya sea modificar la información o dar de baja.</li>
	<li>Administrar tu perfil e información de contacto para cuando alguien esté interesado en rentar una de tus propiedades.</li>
</ul>
<br style="color: #606060;font-family: Helvetica;font-size: 15px;line-height: 22.5px;">
<span style="color: #606060;font-family: helvetica;font-size: 15px;line-height: 22.5px;">Seguramente tienes dudas... Por lo cual encontrarás a continuación algunas respuestas que pueden ser de tu interés:</span><br style="color: #606060;font-family: Helvetica;font-size: 15px;line-height: 22.5px;">
<br style="color: #606060;font-family: Helvetica;font-size: 15px;line-height: 22.5px;">
<span style="font-size:14px"><span style="color: #606060;font-family: helvetica;line-height: 22.5px;"><span style="color: #000000;"><strong>¿Es totalmente gratis?</strong></span></span><br style="color: #606060;font-family: Helvetica;font-size: 15px;line-height: 22.5px;">
<span style="color: #606060;font-family: helvetica;line-height: 22.5px;">Buscar es totalmente gratis para los usuarios, sin embargo al momento de publicar una propiedad (Crib), adquieres el compromiso con CribHunt de otorgarnos el 50% del primer mes de renta si ésta se concreta por medio de CribHunt.</span><br style="color: #606060;font-family: Helvetica;font-size: 15px;line-height: 22.5px;">
<br style="color: #606060;font-family: Helvetica;font-size: 15px;line-height: 22.5px;">
<span style="color: #000000;font-family: helvetica;line-height: 22.5px;"><strong>¿Porqué me conviene anunciar mi propiedad en CribHunt?</strong></span><br style="color: #606060;font-family: Helvetica;font-size: 15px;line-height: 22.5px;">
<span style="color: #606060;font-family: helvetica;line-height: 22.5px;">CribHunt recibe diario cientos de visitas de jóvenes estudiantes y profesionistas en busca de casas, departamentos o cuartos en renta. La plataforma es promocionada en universidades privadas, publicidad en redes sociales y en campañas de Google AdWords. Todo esto sin que el usuario que publica su propiedad tenga que invertir un solo centavo. Al momento de publicar tu propiedad, tienes la garantía de que será visto por usuarios interesados en rentar tu propiedad.</span><br style="color: #606060;font-family: Helvetica;font-size: 15px;line-height: 22.5px;">
<br style="color: #606060;font-family: Helvetica;font-size: 15px;line-height: 22.5px;">
<span style="color: #000000;font-family: helvetica;line-height: 22.5px;"><strong>¿Qué pasa con toda la información que ingreso en el sistema?</strong></span><br style="color: #606060;font-family: Helvetica;font-size: 15px;line-height: 22.5px;">
<span style="color: #606060;font-family: helvetica;line-height: 22.5px;">Toda tu información personal está protegida y encriptada y de ninguna manera será compartida con ningún tercero bajo ninguna circunstancia. No tienes de que preocuparte. De cualquier forma te invitamos a leer nuestro&nbsp;</span><a href="http://cribhunt.co/aviso-de-privacidad.php" style="word-wrap: break-word;color: #6DC6DD;font-family: Helvetica;font-size: 15px;line-height: 22.5px;" target="_blank">Aviso de Privacidad</a><span style="color: #606060;font-family: helvetica;line-height: 22.5px;">para conocer más detalles.</span><br style="color: #606060;font-family: Helvetica;font-size: 15px;line-height: 22.5px;">
<br style="color: #606060;font-family: Helvetica;font-size: 15px;line-height: 22.5px;">
<span style="color: #000000;font-family: helvetica;line-height: 22.5px;"><strong>Tengo más dudas, ¿Qué hago?</strong></span><br style="color: #606060;font-family: Helvetica;font-size: 15px;line-height: 22.5px;">
<span style="color: #606060;font-family: helvetica;line-height: 22.5px;">Puedes escribirnos a&nbsp;</span><a href="mailto:contacto@cribhunt.co" style="word-wrap: break-word;color: #6DC6DD;font-family: Helvetica;font-size: 15px;line-height: 22.5px;" target="_blank">contacto@cribhunt.co</a><span style="color: #606060;font-family: helvetica;line-height: 22.5px;">&nbsp;y te responderemos en menos de 24 horas.</span><br style="color: #606060;font-family: Helvetica;font-size: 15px;line-height: 22.5px;">
<br style="color: #606060;font-family: Helvetica;font-size: 15px;line-height: 22.5px;">
<span style="color: #606060;font-family: helvetica;line-height: 22.5px;">De igual forma quiero informarte que CribHunt se encuentra en continuo desarrollo, por lo que día con día seguimos agregando nuevas funcionalidades para los usuarios ya que todos los días recibimos sugerencias de los usuarios para seguir mejorando el sistema. Si tienes alguna duda, comentario o sugerencia puedes escribirnos a&nbsp;</span><a href="mailto:contacto@cribhunt.co" style="word-wrap: break-word;color: #6DC6DD;font-family: Helvetica;font-size: 15px;line-height: 22.5px;" target="_blank">contacto@cribhunt.co</a><span style="color: #606060;font-family: helvetica;line-height: 22.5px;">&nbsp;y con gusto te responderemos en menos de 24 horas.</span></span>
                        </td>
                    </tr>
                </tbody></table>
                
            </td>
        </tr>
    </tbody>
</table></td>
                                        </tr>
                                    </table>
                                    <!-- // END BODY -->
                                </td>
                            </tr>
                            <tr>
                                <td align="center" valign="top">
                                    <!-- BEGIN COLUMNS // -->
                                    <table border="0" cellpadding="0" cellspacing="0" width="600" id="templateColumns">
                                        <tr>
                                            <td align="left" valign="top" class="columnsContainer" width="50%">
                                                <table border="0" cellpadding="0" cellspacing="0" width="100%" class="templateColumn">
                                                    <tr>
                                                        <td valign="top" class="leftColumnContainer"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock">
    <tbody class="mcnTextBlockOuter">
        <tr>
            <td valign="top" class="mcnTextBlockInner">
                
                <table align="left" border="0" cellpadding="0" cellspacing="0" width="300" class="mcnTextContentContainer">
                    <tbody><tr>
                        
                        <td valign="top" class="mcnTextContent" style="padding-top:9px; padding-right: 18px; padding-bottom: 9px; padding-left: 18px;">
                        
                            <table cellpadding="0" cellspacing="0" style="border-collapse: collapse;color: #606060;font-size: 15px;line-height: 22.5px;text-align: justify;font-family: Times;border-spacing: 0px;vertical-align: top;" width="100%">
	<tbody>
		<tr style="vertical-align: top;">
			<td style="word-break: break-word; vertical-align: top; padding: 25px 10px 10px; border-collapse: collapse !important;">
			<div style="color: #FFFFFF;line-height: 19.2000007629395px;font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;">
			<div data-mce-style="font-size: 18px; line-height: 21px; text-align: center;" style="font-size: 18px; text-align: center; line-height: 22px;"><span style="font-size:24px; line-height:29px"><strong>¿List@? Comienza publicando&nbsp;tu primer propiedad (Crib).</strong></span></div>
			</div>
			</td>
		</tr>
	</tbody>
</table>

<table cellpadding="0" cellspacing="0" style="border-collapse: collapse;color: #606060;font-size: 15px;line-height: 22.5px;text-align: justify;font-family: Times;border-spacing: 0px;vertical-align: top;" width="100%">
	<tbody>
		<tr style="vertical-align: top;">
			<td style="word-break: break-word; vertical-align: top; padding: 0px 10px 10px; border-collapse: collapse !important;">
			<div style="color: #B8B8C0;line-height: 24px;font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;">
			<div data-mce-style="font-size: 12px; line-height: 18px; text-align: center;" style="font-size: 12px; text-align: center; line-height: 18px;"><em><span style="font-size:24px; line-height:36px">"Welcome to&nbsp;<span data-mce-style="text-decoration: line-through;" style="text-decoration:line-through">my</span>&nbsp;your crib."</span></em></div>
			</div>
			</td>
		</tr>
	</tbody>
</table>

                        </td>
                    </tr>
                </tbody></table>
                
            </td>
        </tr>
    </tbody>
</table></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td align="left" valign="top" class="columnsContainer" width="50%">
                                                <table border="0" cellpadding="0" cellspacing="0" width="100%" class="templateColumn">
                                                    <tr>
                                                        <td valign="top" class="rightColumnContainer"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock">
    <tbody class="mcnTextBlockOuter">
        <tr>
            <td valign="top" class="mcnTextBlockInner">
                
                <table align="left" border="0" cellpadding="0" cellspacing="0" width="300" class="mcnTextContentContainer">
                    <tbody><tr>
                        
                        <td valign="top" class="mcnTextContent" style="padding-top:9px; padding-right: 18px; padding-bottom: 9px; padding-left: 18px;">
                        
                            <br>
&nbsp;
                        </td>
                    </tr>
                </tbody></table>
                
            </td>
        </tr>
    </tbody>
</table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnButtonBlock">
    <tbody class="mcnButtonBlockOuter">
        <tr>
            <td style="padding-top:0; padding-right:18px; padding-bottom:18px; padding-left:18px;" valign="top" align="center" class="mcnButtonBlockInner">
                <table border="0" cellpadding="0" cellspacing="0" class="mcnButtonContentContainer" style="border-collapse: separate !important;border: 2px none #707070;border-radius: 2px;background-color: #FF5722;">
                    <tbody>
                        <tr>
                            <td align="center" valign="middle" class="mcnButtonContent" style="font-family: Arial; font-size: 16px; padding: 16px;">
                                <a class="mcnButton " title="Mi Cuenta" href="http://cribhunt.co/login.php" target="_blank" style="font-weight: bold;letter-spacing: normal;line-height: 100%;text-align: center;text-decoration: none;color: #FFFFFF;">Mi Cuenta</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock">
    <tbody class="mcnTextBlockOuter">
        <tr>
            <td valign="top" class="mcnTextBlockInner">
                
                <table align="left" border="0" cellpadding="0" cellspacing="0" width="300" class="mcnTextContentContainer">
                    <tbody><tr>
                        
                        <td valign="top" class="mcnTextContent" style="padding-top:9px; padding-right: 18px; padding-bottom: 9px; padding-left: 18px;">
                        
                            
                        </td>
                    </tr>
                </tbody></table>
                
            </td>
        </tr>
    </tbody>
</table></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- // END COLUMNS -->
                                </td>
                            </tr>
                            <tr>
                                <td align="center" valign="top">
                                    <!-- BEGIN FOOTER // -->
                                    <table border="0" cellpadding="0" cellspacing="0" width="600" id="templateFooter">
                                        <tr>
                                            <td valign="top" class="footerContainer"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnFollowBlock">
    <tbody class="mcnFollowBlockOuter">
        <tr>
            <td align="center" valign="top" style="padding:9px" class="mcnFollowBlockInner">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnFollowContentContainer">
    <tbody><tr>
        <td align="center" style="padding-left:9px;padding-right:9px;">
            <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnFollowContent" style="border: 1px none #EEEEEE;background-color: #3F51B5;">
                <tbody><tr>
                    <td align="center" valign="top" style="padding-top:9px; padding-right:9px; padding-left:9px;">
						<table border="0" cellpadding="0" cellspacing="0">
							<tbody><tr>
								<td valign="top">
			                        
			                            
			                                <table align="left" border="0" cellpadding="0" cellspacing="0" class="mcnFollowStacked">
			                                     
			                                    <tbody><tr>
			                                        <td align="center" valign="top" class="mcnFollowIconContent" style="padding-right:10px; padding-bottom:5px;">
			                                            <a href="http://www.facebook.com/CribHunt" target="_blank"><img src="http://cdn-images.mailchimp.com/icons/social-block-v2/color-facebook-96.png" alt="Facebook" class="mcnFollowBlockIcon" width="48" style="width:48px; max-width:48px; display:block;"></a>
			                                        </td>
			                                    </tr>
			                                    
			                                    
			                                    <tr>
			                                        <td align="center" valign="top" class="mcnFollowTextContent" style="padding-right:10px; padding-bottom:9px;">
			                                            <a href="http://www.facebook.com/CribHunt" target="_blank" style="color: #FFFFFF;font-family: Arial;font-size: 11px;font-weight: normal;line-height: 100%;text-align: center;text-decoration: none;">Facebook</a>
			                                        </td>
			                                    </tr>
			                                    
			                                </tbody></table>
			                            
			                            
								<!--[if gte mso 6]>
								</td>
						    	<td align="left" valign="top">
								<![endif]-->
			                        
			                            
			                                <table align="left" border="0" cellpadding="0" cellspacing="0" class="mcnFollowStacked">
			                                     
			                                    <tbody><tr>
			                                        <td align="center" valign="top" class="mcnFollowIconContent" style="padding-right:10px; padding-bottom:5px;">
			                                            <a href="http://www.twitter.com/CribHunt" target="_blank"><img src="http://cdn-images.mailchimp.com/icons/social-block-v2/color-twitter-96.png" alt="Twitter" class="mcnFollowBlockIcon" width="48" style="width:48px; max-width:48px; display:block;"></a>
			                                        </td>
			                                    </tr>
			                                    
			                                    
			                                    <tr>
			                                        <td align="center" valign="top" class="mcnFollowTextContent" style="padding-right:10px; padding-bottom:9px;">
			                                            <a href="http://www.twitter.com/CribHunt" target="_blank" style="color: #FFFFFF;font-family: Arial;font-size: 11px;font-weight: normal;line-height: 100%;text-align: center;text-decoration: none;">Twitter</a>
			                                        </td>
			                                    </tr>
			                                    
			                                </tbody></table>
			                            
			                            
								<!--[if gte mso 6]>
								</td>
						    	<td align="left" valign="top">
								<![endif]-->
			                        
			                            
			                                <table align="left" border="0" cellpadding="0" cellspacing="0" class="mcnFollowStacked">
			                                     
			                                    <tbody><tr>
			                                        <td align="center" valign="top" class="mcnFollowIconContent" style="padding-right:0; padding-bottom:5px;">
			                                            <a href="http://cribhunt.co" target="_blank"><img src="http://cdn-images.mailchimp.com/icons/social-block-v2/color-link-96.png" alt="Website" class="mcnFollowBlockIcon" width="48" style="width:48px; max-width:48px; display:block;"></a>
			                                        </td>
			                                    </tr>
			                                    
			                                    
			                                    <tr>
			                                        <td align="center" valign="top" class="mcnFollowTextContent" style="padding-right:0; padding-bottom:9px;">
			                                            <a href="http://cribhunt.co" target="_blank" style="color: #FFFFFF;font-family: Arial;font-size: 11px;font-weight: normal;line-height: 100%;text-align: center;text-decoration: none;">Website</a>
			                                        </td>
			                                    </tr>
			                                    
			                                </tbody></table>
			                            
			                            
								<!--[if gte mso 6]>
								</td>
						    	<td align="left" valign="top">
								<![endif]-->
			                        
								</td>
							</tr>
						</tbody></table>
                    </td>
                </tr>
            </tbody></table>
        </td>
    </tr>
</tbody></table>

            </td>
        </tr>
    </tbody>
</table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock">
    <tbody class="mcnTextBlockOuter">
        <tr>
            <td valign="top" class="mcnTextBlockInner">
                
                <table align="left" border="0" cellpadding="0" cellspacing="0" width="600" class="mcnTextContentContainer">
                    <tbody><tr>
                        
                        <td valign="top" class="mcnTextContent" style="padding-top:9px; padding-right: 18px; padding-bottom: 9px; padding-left: 18px;">
                        
                            <br>
CribHunt ® 2015
                        </td>
                    </tr>
                </tbody></table>
                
            </td>
        </tr>
    </tbody>
</table></td>
                                        </tr>
                                    </table>
                                    <!-- // END FOOTER -->
                                </td>
                            </tr>
                        </table>
                        <!-- // END TEMPLATE -->
                    </td>
                </tr>
            </table>
        </center>
    </body>
</html>
EOD;

 ?>