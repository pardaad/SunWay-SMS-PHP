<?php
class SMS
{
    public $Username = '';
    public $Password = '';
    
    private $SoapAddress = 'http://sms.sunwaysms.com/SMSWS/SOAP.asmx?wsdl';
    private $client;

    function __construct()
    {
        $this->client = new SoapClient($this->SoapAddress);
    }

    public Function GetClient(){
        return $this->client;
    }
    public Function GetClientEx($option){
        return new SoapClient($this->SoapAddress, $option);
    }
    
    public Function GetMethods(){
        $arr = array();
        $client = GetClient();
        return $client->__getFunctions();
    }
    
    public Function GetCredit(){
        $option = array('UserName'=> $this->Username,'Password'=> $this->Password);
        $client = $this->GetClient();
        return $client->GetCredit($option)->GetCreditResult;
    }
    
    public Function SendArray($MobileNumbersArray, $Message, $SpecialNumber, $IsFlashMessage, $CheckingMessageID){
        $option = array('UserName'=> $this->Username,'Password'=> $this->Password,'RecipientNumber'=> $MobileNumbersArray,'MessageBody'=> $Message,'SpecialNumber'=> $SpecialNumber,'IsFlashMessage'=> $IsFlashMessage,'CheckingMessageID'=> $CheckingMessageID);
        $client = $this->GetClient();
        return $client->SendArray($option)->SendArrayResult;
    }
    
    public Function SendArraySchedule($MobileNumbersArray, $Message, $SpecialNumber, $IsFlashMessage, $CheckingMessageID, $Year, $Month, $Day, $Hour, $Minute){
        $option = array('UserName'=> $this->Username,'Password'=> $this->Password,'RecipientNumber'=> $MobileNumbersArray,'MessageBody'=> $Message,'SpecialNumber'=> $SpecialNumber,'IsFlashMessage'=> $IsFlashMessage,'CheckingMessageID'=> $CheckingMessageID, 'Year'=> $Year, 'Month'=> $Month, 'Day'=> $Day, 'Hour'=> $Hour, 'Minute'=> $Minute);
        $client = $this->GetClient();
        return $client->SendArraySchedule($option)->SendArrayScheduleResult;
    }
    
    public Function GetMessageID($CheckingMessageIDArray){
        $option = array('UserName'=> $this->Username,'Password'=> $this->Password,'CheckingMessageID'=> $CheckingMessageIDArray);
        $client = $this->GetClient();
        return $client->GetMessageID($option)->GetMessageIDResult;
    }

    public Function GetMessageStatus($MessageIDArray){
        $option = array('UserName'=> $this->Username,'Password'=> $this->Password,'MessageID'=> $MessageIDArray);
        $client = $this->GetClient();
        return $client->GetMessageStatus($option)->GetMessageStatusResult;
    }

    public Function GetNumberGroupData(){
        $option = array('UserName'=> $this->Username,'Password'=> $this->Password);
        $client = $this->GetClient();
        return $client->GetNumberGroupData($option)->GetNumberGroupDataResult;
    }
    
    public Function SendNumberGroup($NumberGroupIDArray, $MessageBody, $SpecialNumber, $IsFlashMessage, $DontSendToRepeatedNumber){
        $option = array('UserName'=> $this->Username,'Password'=> $this->Password,
                        'NumberGroupID'=> $NumberGroupIDArray, 
                        'MessageBody'=> $MessageBody,
                        'SpecialNumber'=> $SpecialNumber,
                        'IsFlashMessage'=> $IsFlashMessage,
                        'DontSendToRepeatedNumber'=> $DontSendToRepeatedNumber);
                        
        $client = $this->GetClient();
        return $client->SendNumberGroup($option)->SendNumberGroupResult;
    }
     
    public Function SendNumberGroupSchedule($NumberGroupIDArray, $MessageBody, $SpecialNumber, $IsFlashMessage, $DontSendToRepeatedNumber, $Year, $Month, $Day, $Hour, $Minute){
        $option = array('UserName'=> $this->Username,'Password'=> $this->Password,
                        'NumberGroupID'=> $NumberGroupIDArray, 
                        'MessageBody'=> $MessageBody,
                        'SpecialNumber'=> $SpecialNumber,
                        'IsFlashMessage'=> $IsFlashMessage,
                        'DontSendToRepeatedNumber'=> $DontSendToRepeatedNumber,
                        'Year'=> $Year, 'Month'=> $Month, 'Day'=> $Day, 'Hour'=> $Hour, 'Minute'=> $Minute);
        
        $client = $this->GetClient();
        return $client->SendNumberGroupSchedule($option)->SendNumberGroupScheduleResult;
    }
   
    public Function InsertNumberInNumberGroup($NumberGroupID, $PersonNumberArray, $PersonNameArray){
        $option = array('UserName'=> $this->Username,'Password'=> $this->Password,
                        'NumberGroupID'=> $NumberGroupID, 
                        'PersonNumber'=> $PersonNumberArray,
                        'PersonName'=> $PersonNameArray);
        
        $client = $this->GetClient();
        return $client->InsertNumberInNumberGroup($option)->InsertNumberInNumberGroupResult;
    }
    
    public Function GetInboxMessage($NumberOfMessage){
        $option = array('UserName'=> $this->Username,'Password'=> $this->Password,
                        'NumberOfMessage'=> $NumberOfMessage);
        
        $client = $this->GetClient();
        return $client->GetInboxMessage($option)->GetInboxMessageResult;
    }
    
    public Function GetInboxMessageWithNumber($NumberOfMessage, $SpecialNumber){
        $option = array('UserName'=> $this->Username,'Password'=> $this->Password,
                        'NumberOfMessage'=> $NumberOfMessage,
                        'SpecialNumber'=> $SpecialNumber);
        
        $client = $this->GetClient();
        return $client->GetInboxMessageWithNumber($option)->GetInboxMessageWithNumberResult;
    }

    public  function GetInboxMessageWithInboxID($NumberOfMessage, $InboxID, $IsReaded) {
        $option = array('UserName'=> $this->Username,'Password'=> $this->Password,
                        'NumberOfMessage'=> $NumberOfMessage,'InboxID'=> $InboxID,'IsReaded'=> IsReaded);
        
        $client = $this->GetClient();
        return $client->GetInboxMessageWithInboxID($option)->GetInboxMessageWithInboxIDResult;
    }

    public Function GetUserInfo() {
            $option = array('UserName'=> $this->Username,'Password'=> $this->Password);
        
        $client = $this->GetClient();
        return $client->GetUserInfo($option)->GetUserInfoResult;
    }    

}

 class Method_Status
    {
        const MessageIDIsInvalid = 0;
        const PendingStatus = 1;
        const DeliveredToPhone = 2;
        const FailedToPhone = 3;
        const DeliveredToServiceCenter = 4;
        const FailedToServiceCenter = 5;
        const InDisableList = 6;
        const InSendQueue = 7;
        const Sending = 8;
        const LowCredit = 9;
        const NotSent = 10;
  
        const Successful = 50;
 
        const UserNameOrPasswordIsWrong = 51;
        const UserNameOrPasswordIsEmpty = 52;
        const RecipientNumberLengthIsMoreThanUsual = 53;
        const RecipientNumberIsEmpty = 54;
        const RecipientNumberIsNull = 55;
        const MessageIDLengthIsMoreThanUsual = 56;
        const MessageIDIsEmpty = 57;
        const MessageIDIsNull = 58;
        const MessageBodyIsEmpty = 59;
        const InThisTimeServerCannotRespond = 60;
        const SpecialNumberIsInvalid = 61;
        const SpecialNumberIsEmpty = 62;
        const ThisIPIsInvalid = 63;
        const WSIDIsWrong = 64;
        const NumberOfMessageIsWrong = 65;
        const CheckingMessageIDLengthIsNotEqualWithRecipientNumberLength = 66;
        const CheckingMessageIDLengthIsMoreThanUsual = 67;
        const CheckingMessageIDIsEmpty = 68;
        const CheckingMessageIDIsNull = 69;
        const YourUserIsInActive = 70;
        const DomainIsInvalid = 71;
        const TimeIsWrong = 72;
        const DateIsWrong = 73;
        const NumberGroupIDLengthIsMoreThanUsual = 74;
        const NumberGroupIDIsEmpty = 75;
        const NumberGroupIDIsNull = 76;
        const YouAreNotWebServiceUser = 77;
        const YouAreNotSMSPanelUser = 78;
        const PersonNameLengthIsNotEqualWithPersonNumberLength = 79;
        const ServiceIsInActive = 80;
        const PersonNumberLengthIsMoreThanUsual = 81;
        const PersonNumberIsEmpty = 82;
        const PersonNumberIsNull = 83;
        const NumberGroupIDIsInvalid = 84;
        const RecipientNumberFormatIsWrong = 201;
        const RecipientNumberOperatorIsInvalid = 202;
        const YouCanNotSendThisBecauseYourCreditIsNotEnough = 203;
        const CheckingMessageIDIsNotValid = 204;
        const PersonNumberFormatIsWrong = 205;
        const PersonNumberOperatorIsInvalid = 206;
    }


?>