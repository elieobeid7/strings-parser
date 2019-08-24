

classGetAttendanceRecordsActionextendsBaseApiAction
{
protected$verbs=array('GET');,22,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'time'=>'',
];,34,/n

publicfunctionexecute()
{
$time=$this->request->get('time',time());,38,/n
$domainId=$this->request->get('domain_id');,39,/n

return$this->response->statusOk($recordsMap);,51,/n


classGetHolidaysActionextendsBaseApiAction
{
protected$verbs=array('GET');,15,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'search_value'=>'',
'start_timestamp'=>'',
'end_timestamp'=>''

];,30,/n

publicfunctionexecute()
{
$searchValue=$this->request->get('search_value');,34,/n
$startTimestamp=$this->request->get('start_timestamp');,35,/n
$endTimestamp=$this->request->get('end_timestamp');,36,/n
return$this->response->statusOk($result);,38,/n

classAddAttendanceActionActionextendsBaseApiAction
{
protected$inputRules=[
'domain_id'=>'required',
'beacon_id'=>'',
'office_id'=>'',
'time'=>'',
'action_type'=>'required'
];,25,/n

constINVALID_ACTION_TYPE='add_attendance_action__invalid_action_type';,27,/n
constINVALID_ACTION_TIME='add_attendance_action__invalidtime';,28,/n
$time=$this->request->get('time');,37,/n
$beaconId=$this->request->get('beacon_id');,42,/n
$officeId=$this->request->get('office_id');,43,/n

$actionType=$this->request->get('action_type');,45,/n
if(!in_array($actionType,[
AttendanceActionType::ENTER_BEACON_REGION,
AttendanceActionType::EXIT_BEACON_REGION,
AttendanceActionType::ENTER_GEOFENCE_REGION,
AttendanceActionType::EXIT_GEOFENCE_REGION,
])){
$this->response->addErrorDialog(trans(self::INVALID_ACTION_TYPE));,52,/n
return$this->response->statusFail(trans(self::INVALID_ACTION_TYPE));,53,/n
}
if($time>$now+self::MINS_FORWARD_TOLERANCE*60){
$this->response->addErrorDialog(self::INVALID_ACTION_TIME);,60,/n
return$this->response->statusFail(self::INVALID_ACTION_TIME);,61,/n
$attributes=[
'user_id'=>\Auth::id(),
'domain_id'=>$this->domainId,
'deferred'=>$deferred,
'action_type'=>$actionType,
'time'=>$time
];,70,/n
if(isset($beaconId)&&!empty($beaconId)){
$attributes['beacon_id']=$beaconId;,72,/n
}
if(isset($officeId)&&!empty($officeId)){
$attributes['office_id']=$officeId;,75,/n
return$this->response->statusOk([
'should_refresh'=>$countAdded>0
]);,82,/n


classGetOfficesActionextendsBaseApiAction
{
protected$verbs=array('GET');,15,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'search_value'=>'',
'office_timezone'=>'',
'location_name'=>''

];,30,/n

publicfunctionexecute()
{
$searchValue=$this->request->get('search_value');,34,/n
$officeTimezone=$this->request->get('office_timezone');,35,/n
$locationName=$this->request->get('location_name');,36,/n
return$this->response->statusOk($result);,38,/n

classRegisterActionsActionextendsBaseApiAction
{

protected$inputRules=[
'actions'=>'required'
];,19,/n

publicfunctionexecute()
{
$actions=$this->request->get('actions',[]);,23,/n

classGetWorkdaysActionextendsBaseApiAction
{
protected$verbs=array('GET');,14,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'day_index'=>''
];,26,/n

publicfunctionexecute()
{
$domainId=$this->request->get('domain_id');,30,/n
$dayIndex=$this->request->get('day_index',null);,31,/n
}
return$this->response->statusOk($result);,38,/n

classWorkdaysActionextendsBaseApiAction
{
protected$verbs=array('POST');,14,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'day_index'=>'required',
'day_start_time'=>'required',
'day_end_time'=>'required'
];,28,/n


publicfunctionexecute()
{
$domainId=$this->request->get('domain_id');,33,/n
$day_index=$this->request->get('day_index');,34,/n
$dayStartTime=$this->request->get('day_start_time');,35,/n
$dayEndTime=$this->request->get('day_end_time');,36,/n

/**
*BeaconCheckInAction
*
*@authorJosephSaliba<joe@getray.com>
*/
classCheckinCheckoutActionextendsBaseApiAction
{
protected$verbs=array('POST');,24,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'beacon_id'=>'',
'in_geofence'=>'required',
'time'=>'',
'type'=>'',//Checkinorcheckout.
'is_automatic'=>''
];,40,/n
constINVALID_ACTION_TIME='add_attendance_action__invalidtime';,44,/n

constYOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN='checkin_checkout__be_around_the_office_to_checkin';,46,/n
constMANUAL_CHECKIN_NOT_AVAILBALE='checkin_checkout__manual_checkin_not_available';,47,/n

publicfunctionexecute()
{
$beaconId=$this->request->get('beacon_id');,51,/n
$inGeofence=$this->request->get('in_geofence');,53,/n
$isAutomatic=$this->request->get('is_automatic',0);,54,/n
switch($manualCheckinMode){
case$manualCheckinMode==ManualCheckinMode::OFF:{
$this->response->addErrorDialog(self::MANUAL_CHECKIN_NOT_AVAILBALE);,61,/n
return$this->response->statusFail(self::MANUAL_CHECKIN_NOT_AVAILBALE);,62,/n
if(!$validBeacon){
$this->response->addErrorDialog(self::YOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN);,69,/n
return$this->response->statusFail(self::YOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN);,70,/n
default:{
$this->response->addErrorDialog(self::YOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN);,77,/n
return$this->response->statusFail(self::YOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN);,78,/n
$actionTime=$this->request->get('time',$now);,85,/n
$type=$this->request->get('type');,86,/n
if($actionTime>$now+60*self::MINS_FORWARD_TOLERANCE){
return$this->response->statusFail(self::INVALID_ACTION_TIME);,88,/n
AttendanceAction::create([
'user_id'=>$userId,
'domain_id'=>$this->domainId,
'time'=>$actionTimeCarbon,
'action_type'=>$type,
'deferred'=>$deferredTime,
]);,101,/n
$attendanceRecord=AttendanceRecord::firstOrCreate([
'user_id'=>$userId,
'domain_id'=>$this->domainId,
'day'=>$actionTimeCarbon->toDateString()
]);,120,/n

$attendanceRecordYesterday=AttendanceRecord::where('user_id',$userId)
->where('domain_id',$this->domainId)
->where('day',$yesterday->toDateString())
->first();,141,/n

classTestGetAttendanceActionextendsBaseAction
{
publicfunctionexecute()
{
return[
'records'=>AttendanceHelper::buildAttendanceRecord(AttendanceDomainSettings::where('domain_id',68)->first())];,22,/n

classGetAttendanceRecordsActionextendsBaseApiAction
{
protected$verbs=array('GET');,22,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'time'=>'',
];,34,/n

publicfunctionexecute()
{
$time=$this->request->get('time',time());,38,/n
$domainId=$this->request->get('domain_id');,39,/n

return$this->response->statusOk($recordsMap);,51,/n


classGetHolidaysActionextendsBaseApiAction
{
protected$verbs=array('GET');,15,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'search_value'=>'',
'start_timestamp'=>'',
'end_timestamp'=>''

];,30,/n

publicfunctionexecute()
{
$searchValue=$this->request->get('search_value');,34,/n
$startTimestamp=$this->request->get('start_timestamp');,35,/n
$endTimestamp=$this->request->get('end_timestamp');,36,/n
return$this->response->statusOk($result);,38,/n

classAddAttendanceActionActionextendsBaseApiAction
{
protected$inputRules=[
'domain_id'=>'required',
'beacon_id'=>'',
'office_id'=>'',
'time'=>'',
'action_type'=>'required'
];,25,/n

constINVALID_ACTION_TYPE='add_attendance_action__invalid_action_type';,27,/n
constINVALID_ACTION_TIME='add_attendance_action__invalidtime';,28,/n
$time=$this->request->get('time');,37,/n
$beaconId=$this->request->get('beacon_id');,42,/n
$officeId=$this->request->get('office_id');,43,/n

$actionType=$this->request->get('action_type');,45,/n
if(!in_array($actionType,[
AttendanceActionType::ENTER_BEACON_REGION,
AttendanceActionType::EXIT_BEACON_REGION,
AttendanceActionType::ENTER_GEOFENCE_REGION,
AttendanceActionType::EXIT_GEOFENCE_REGION,
])){
$this->response->addErrorDialog(trans(self::INVALID_ACTION_TYPE));,52,/n
return$this->response->statusFail(trans(self::INVALID_ACTION_TYPE));,53,/n
}
if($time>$now+self::MINS_FORWARD_TOLERANCE*60){
$this->response->addErrorDialog(self::INVALID_ACTION_TIME);,60,/n
return$this->response->statusFail(self::INVALID_ACTION_TIME);,61,/n
$attributes=[
'user_id'=>\Auth::id(),
'domain_id'=>$this->domainId,
'deferred'=>$deferred,
'action_type'=>$actionType,
'time'=>$time
];,70,/n
if(isset($beaconId)&&!empty($beaconId)){
$attributes['beacon_id']=$beaconId;,72,/n
}
if(isset($officeId)&&!empty($officeId)){
$attributes['office_id']=$officeId;,75,/n
return$this->response->statusOk([
'should_refresh'=>$countAdded>0
]);,82,/n


classGetOfficesActionextendsBaseApiAction
{
protected$verbs=array('GET');,15,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'search_value'=>'',
'office_timezone'=>'',
'location_name'=>''

];,30,/n

publicfunctionexecute()
{
$searchValue=$this->request->get('search_value');,34,/n
$officeTimezone=$this->request->get('office_timezone');,35,/n
$locationName=$this->request->get('location_name');,36,/n
return$this->response->statusOk($result);,38,/n

classRegisterActionsActionextendsBaseApiAction
{

protected$inputRules=[
'actions'=>'required'
];,19,/n

publicfunctionexecute()
{
$actions=$this->request->get('actions',[]);,23,/n

classGetWorkdaysActionextendsBaseApiAction
{
protected$verbs=array('GET');,14,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'day_index'=>''
];,26,/n

publicfunctionexecute()
{
$domainId=$this->request->get('domain_id');,30,/n
$dayIndex=$this->request->get('day_index',null);,31,/n
}
return$this->response->statusOk($result);,38,/n

classWorkdaysActionextendsBaseApiAction
{
protected$verbs=array('POST');,14,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'day_index'=>'required',
'day_start_time'=>'required',
'day_end_time'=>'required'
];,28,/n


publicfunctionexecute()
{
$domainId=$this->request->get('domain_id');,33,/n
$day_index=$this->request->get('day_index');,34,/n
$dayStartTime=$this->request->get('day_start_time');,35,/n
$dayEndTime=$this->request->get('day_end_time');,36,/n

/**
*BeaconCheckInAction
*
*@authorJosephSaliba<joe@getray.com>
*/
classCheckinCheckoutActionextendsBaseApiAction
{
protected$verbs=array('POST');,24,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'beacon_id'=>'',
'in_geofence'=>'required',
'time'=>'',
'type'=>'',//Checkinorcheckout.
'is_automatic'=>''
];,40,/n
constINVALID_ACTION_TIME='add_attendance_action__invalidtime';,44,/n

constYOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN='checkin_checkout__be_around_the_office_to_checkin';,46,/n
constMANUAL_CHECKIN_NOT_AVAILBALE='checkin_checkout__manual_checkin_not_available';,47,/n

publicfunctionexecute()
{
$beaconId=$this->request->get('beacon_id');,51,/n
$inGeofence=$this->request->get('in_geofence');,53,/n
$isAutomatic=$this->request->get('is_automatic',0);,54,/n
switch($manualCheckinMode){
case$manualCheckinMode==ManualCheckinMode::OFF:{
$this->response->addErrorDialog(self::MANUAL_CHECKIN_NOT_AVAILBALE);,61,/n
return$this->response->statusFail(self::MANUAL_CHECKIN_NOT_AVAILBALE);,62,/n
if(!$validBeacon){
$this->response->addErrorDialog(self::YOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN);,69,/n
return$this->response->statusFail(self::YOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN);,70,/n
default:{
$this->response->addErrorDialog(self::YOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN);,77,/n
return$this->response->statusFail(self::YOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN);,78,/n
$actionTime=$this->request->get('time',$now);,85,/n
$type=$this->request->get('type');,86,/n
if($actionTime>$now+60*self::MINS_FORWARD_TOLERANCE){
return$this->response->statusFail(self::INVALID_ACTION_TIME);,88,/n
AttendanceAction::create([
'user_id'=>$userId,
'domain_id'=>$this->domainId,
'time'=>$actionTimeCarbon,
'action_type'=>$type,
'deferred'=>$deferredTime,
]);,101,/n
$attendanceRecord=AttendanceRecord::firstOrCreate([
'user_id'=>$userId,
'domain_id'=>$this->domainId,
'day'=>$actionTimeCarbon->toDateString()
]);,120,/n

$attendanceRecordYesterday=AttendanceRecord::where('user_id',$userId)
->where('domain_id',$this->domainId)
->where('day',$yesterday->toDateString())
->first();,141,/n

classTestGetAttendanceActionextendsBaseAction
{
publicfunctionexecute()
{
return[
'records'=>AttendanceHelper::buildAttendanceRecord(AttendanceDomainSettings::where('domain_id',68)->first())];,22,/n

classGetAttendanceRecordsActionextendsBaseApiAction
{
protected$verbs=array('GET');,22,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'time'=>'',
];,34,/n

publicfunctionexecute()
{
$time=$this->request->get('time',time());,38,/n
$domainId=$this->request->get('domain_id');,39,/n

return$this->response->statusOk($recordsMap);,51,/n


classGetHolidaysActionextendsBaseApiAction
{
protected$verbs=array('GET');,15,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'search_value'=>'',
'start_timestamp'=>'',
'end_timestamp'=>''

];,30,/n

publicfunctionexecute()
{
$searchValue=$this->request->get('search_value');,34,/n
$startTimestamp=$this->request->get('start_timestamp');,35,/n
$endTimestamp=$this->request->get('end_timestamp');,36,/n
return$this->response->statusOk($result);,38,/n

classAddAttendanceActionActionextendsBaseApiAction
{
protected$inputRules=[
'domain_id'=>'required',
'beacon_id'=>'',
'office_id'=>'',
'time'=>'',
'action_type'=>'required'
];,25,/n

constINVALID_ACTION_TYPE='add_attendance_action__invalid_action_type';,27,/n
constINVALID_ACTION_TIME='add_attendance_action__invalidtime';,28,/n
$time=$this->request->get('time');,37,/n
$beaconId=$this->request->get('beacon_id');,42,/n
$officeId=$this->request->get('office_id');,43,/n

$actionType=$this->request->get('action_type');,45,/n
if(!in_array($actionType,[
AttendanceActionType::ENTER_BEACON_REGION,
AttendanceActionType::EXIT_BEACON_REGION,
AttendanceActionType::ENTER_GEOFENCE_REGION,
AttendanceActionType::EXIT_GEOFENCE_REGION,
])){
$this->response->addErrorDialog(trans(self::INVALID_ACTION_TYPE));,52,/n
return$this->response->statusFail(trans(self::INVALID_ACTION_TYPE));,53,/n
}
if($time>$now+self::MINS_FORWARD_TOLERANCE*60){
$this->response->addErrorDialog(self::INVALID_ACTION_TIME);,60,/n
return$this->response->statusFail(self::INVALID_ACTION_TIME);,61,/n
$attributes=[
'user_id'=>\Auth::id(),
'domain_id'=>$this->domainId,
'deferred'=>$deferred,
'action_type'=>$actionType,
'time'=>$time
];,70,/n
if(isset($beaconId)&&!empty($beaconId)){
$attributes['beacon_id']=$beaconId;,72,/n
}
if(isset($officeId)&&!empty($officeId)){
$attributes['office_id']=$officeId;,75,/n
return$this->response->statusOk([
'should_refresh'=>$countAdded>0
]);,82,/n


classGetOfficesActionextendsBaseApiAction
{
protected$verbs=array('GET');,15,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'search_value'=>'',
'office_timezone'=>'',
'location_name'=>''

];,30,/n

publicfunctionexecute()
{
$searchValue=$this->request->get('search_value');,34,/n
$officeTimezone=$this->request->get('office_timezone');,35,/n
$locationName=$this->request->get('location_name');,36,/n
return$this->response->statusOk($result);,38,/n

classRegisterActionsActionextendsBaseApiAction
{

protected$inputRules=[
'actions'=>'required'
];,19,/n

publicfunctionexecute()
{
$actions=$this->request->get('actions',[]);,23,/n

classGetWorkdaysActionextendsBaseApiAction
{
protected$verbs=array('GET');,14,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'day_index'=>''
];,26,/n

publicfunctionexecute()
{
$domainId=$this->request->get('domain_id');,30,/n
$dayIndex=$this->request->get('day_index',null);,31,/n
}
return$this->response->statusOk($result);,38,/n

classWorkdaysActionextendsBaseApiAction
{
protected$verbs=array('POST');,14,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'day_index'=>'required',
'day_start_time'=>'required',
'day_end_time'=>'required'
];,28,/n


publicfunctionexecute()
{
$domainId=$this->request->get('domain_id');,33,/n
$day_index=$this->request->get('day_index');,34,/n
$dayStartTime=$this->request->get('day_start_time');,35,/n
$dayEndTime=$this->request->get('day_end_time');,36,/n

/**
*BeaconCheckInAction
*
*@authorJosephSaliba<joe@getray.com>
*/
classCheckinCheckoutActionextendsBaseApiAction
{
protected$verbs=array('POST');,24,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'beacon_id'=>'',
'in_geofence'=>'required',
'time'=>'',
'type'=>'',//Checkinorcheckout.
'is_automatic'=>''
];,40,/n
constINVALID_ACTION_TIME='add_attendance_action__invalidtime';,44,/n

constYOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN='checkin_checkout__be_around_the_office_to_checkin';,46,/n
constMANUAL_CHECKIN_NOT_AVAILBALE='checkin_checkout__manual_checkin_not_available';,47,/n

publicfunctionexecute()
{
$beaconId=$this->request->get('beacon_id');,51,/n
$inGeofence=$this->request->get('in_geofence');,53,/n
$isAutomatic=$this->request->get('is_automatic',0);,54,/n
switch($manualCheckinMode){
case$manualCheckinMode==ManualCheckinMode::OFF:{
$this->response->addErrorDialog(self::MANUAL_CHECKIN_NOT_AVAILBALE);,61,/n
return$this->response->statusFail(self::MANUAL_CHECKIN_NOT_AVAILBALE);,62,/n
if(!$validBeacon){
$this->response->addErrorDialog(self::YOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN);,69,/n
return$this->response->statusFail(self::YOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN);,70,/n
default:{
$this->response->addErrorDialog(self::YOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN);,77,/n
return$this->response->statusFail(self::YOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN);,78,/n
$actionTime=$this->request->get('time',$now);,85,/n
$type=$this->request->get('type');,86,/n
if($actionTime>$now+60*self::MINS_FORWARD_TOLERANCE){
return$this->response->statusFail(self::INVALID_ACTION_TIME);,88,/n
AttendanceAction::create([
'user_id'=>$userId,
'domain_id'=>$this->domainId,
'time'=>$actionTimeCarbon,
'action_type'=>$type,
'deferred'=>$deferredTime,
]);,101,/n
$attendanceRecord=AttendanceRecord::firstOrCreate([
'user_id'=>$userId,
'domain_id'=>$this->domainId,
'day'=>$actionTimeCarbon->toDateString()
]);,120,/n

$attendanceRecordYesterday=AttendanceRecord::where('user_id',$userId)
->where('domain_id',$this->domainId)
->where('day',$yesterday->toDateString())
->first();,141,/n

classTestGetAttendanceActionextendsBaseAction
{
publicfunctionexecute()
{
return[
'records'=>AttendanceHelper::buildAttendanceRecord(AttendanceDomainSettings::where('domain_id',68)->first())];,22,/n

classGetAttendanceRecordsActionextendsBaseApiAction
{
protected$verbs=array('GET');,22,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'time'=>'',
];,34,/n

publicfunctionexecute()
{
$time=$this->request->get('time',time());,38,/n
$domainId=$this->request->get('domain_id');,39,/n

return$this->response->statusOk($recordsMap);,51,/n


classGetHolidaysActionextendsBaseApiAction
{
protected$verbs=array('GET');,15,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'search_value'=>'',
'start_timestamp'=>'',
'end_timestamp'=>''

];,30,/n

publicfunctionexecute()
{
$searchValue=$this->request->get('search_value');,34,/n
$startTimestamp=$this->request->get('start_timestamp');,35,/n
$endTimestamp=$this->request->get('end_timestamp');,36,/n
return$this->response->statusOk($result);,38,/n

classAddAttendanceActionActionextendsBaseApiAction
{
protected$inputRules=[
'domain_id'=>'required',
'beacon_id'=>'',
'office_id'=>'',
'time'=>'',
'action_type'=>'required'
];,25,/n

constINVALID_ACTION_TYPE='add_attendance_action__invalid_action_type';,27,/n
constINVALID_ACTION_TIME='add_attendance_action__invalidtime';,28,/n
$time=$this->request->get('time');,37,/n
$beaconId=$this->request->get('beacon_id');,42,/n
$officeId=$this->request->get('office_id');,43,/n

$actionType=$this->request->get('action_type');,45,/n
if(!in_array($actionType,[
AttendanceActionType::ENTER_BEACON_REGION,
AttendanceActionType::EXIT_BEACON_REGION,
AttendanceActionType::ENTER_GEOFENCE_REGION,
AttendanceActionType::EXIT_GEOFENCE_REGION,
])){
$this->response->addErrorDialog(trans(self::INVALID_ACTION_TYPE));,52,/n
return$this->response->statusFail(trans(self::INVALID_ACTION_TYPE));,53,/n
}
if($time>$now+self::MINS_FORWARD_TOLERANCE*60){
$this->response->addErrorDialog(self::INVALID_ACTION_TIME);,60,/n
return$this->response->statusFail(self::INVALID_ACTION_TIME);,61,/n
$attributes=[
'user_id'=>\Auth::id(),
'domain_id'=>$this->domainId,
'deferred'=>$deferred,
'action_type'=>$actionType,
'time'=>$time
];,70,/n
if(isset($beaconId)&&!empty($beaconId)){
$attributes['beacon_id']=$beaconId;,72,/n
}
if(isset($officeId)&&!empty($officeId)){
$attributes['office_id']=$officeId;,75,/n
return$this->response->statusOk([
'should_refresh'=>$countAdded>0
]);,82,/n


classGetOfficesActionextendsBaseApiAction
{
protected$verbs=array('GET');,15,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'search_value'=>'',
'office_timezone'=>'',
'location_name'=>''

];,30,/n

publicfunctionexecute()
{
$searchValue=$this->request->get('search_value');,34,/n
$officeTimezone=$this->request->get('office_timezone');,35,/n
$locationName=$this->request->get('location_name');,36,/n
return$this->response->statusOk($result);,38,/n

classRegisterActionsActionextendsBaseApiAction
{

protected$inputRules=[
'actions'=>'required'
];,19,/n

publicfunctionexecute()
{
$actions=$this->request->get('actions',[]);,23,/n

classGetWorkdaysActionextendsBaseApiAction
{
protected$verbs=array('GET');,14,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'day_index'=>''
];,26,/n

publicfunctionexecute()
{
$domainId=$this->request->get('domain_id');,30,/n
$dayIndex=$this->request->get('day_index',null);,31,/n
}
return$this->response->statusOk($result);,38,/n

classWorkdaysActionextendsBaseApiAction
{
protected$verbs=array('POST');,14,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'day_index'=>'required',
'day_start_time'=>'required',
'day_end_time'=>'required'
];,28,/n


publicfunctionexecute()
{
$domainId=$this->request->get('domain_id');,33,/n
$day_index=$this->request->get('day_index');,34,/n
$dayStartTime=$this->request->get('day_start_time');,35,/n
$dayEndTime=$this->request->get('day_end_time');,36,/n

/**
*BeaconCheckInAction
*
*@authorJosephSaliba<joe@getray.com>
*/
classCheckinCheckoutActionextendsBaseApiAction
{
protected$verbs=array('POST');,24,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'beacon_id'=>'',
'in_geofence'=>'required',
'time'=>'',
'type'=>'',//Checkinorcheckout.
'is_automatic'=>''
];,40,/n
constINVALID_ACTION_TIME='add_attendance_action__invalidtime';,44,/n

constYOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN='checkin_checkout__be_around_the_office_to_checkin';,46,/n
constMANUAL_CHECKIN_NOT_AVAILBALE='checkin_checkout__manual_checkin_not_available';,47,/n

publicfunctionexecute()
{
$beaconId=$this->request->get('beacon_id');,51,/n
$inGeofence=$this->request->get('in_geofence');,53,/n
$isAutomatic=$this->request->get('is_automatic',0);,54,/n
switch($manualCheckinMode){
case$manualCheckinMode==ManualCheckinMode::OFF:{
$this->response->addErrorDialog(self::MANUAL_CHECKIN_NOT_AVAILBALE);,61,/n
return$this->response->statusFail(self::MANUAL_CHECKIN_NOT_AVAILBALE);,62,/n
if(!$validBeacon){
$this->response->addErrorDialog(self::YOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN);,69,/n
return$this->response->statusFail(self::YOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN);,70,/n
default:{
$this->response->addErrorDialog(self::YOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN);,77,/n
return$this->response->statusFail(self::YOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN);,78,/n
$actionTime=$this->request->get('time',$now);,85,/n
$type=$this->request->get('type');,86,/n
if($actionTime>$now+60*self::MINS_FORWARD_TOLERANCE){
return$this->response->statusFail(self::INVALID_ACTION_TIME);,88,/n
AttendanceAction::create([
'user_id'=>$userId,
'domain_id'=>$this->domainId,
'time'=>$actionTimeCarbon,
'action_type'=>$type,
'deferred'=>$deferredTime,
]);,101,/n
$attendanceRecord=AttendanceRecord::firstOrCreate([
'user_id'=>$userId,
'domain_id'=>$this->domainId,
'day'=>$actionTimeCarbon->toDateString()
]);,120,/n

$attendanceRecordYesterday=AttendanceRecord::where('user_id',$userId)
->where('domain_id',$this->domainId)
->where('day',$yesterday->toDateString())
->first();,141,/n

classTestGetAttendanceActionextendsBaseAction
{
publicfunctionexecute()
{
return[
'records'=>AttendanceHelper::buildAttendanceRecord(AttendanceDomainSettings::where('domain_id',68)->first())];,22,/n

classGetAttendanceRecordsActionextendsBaseApiAction
{
protected$verbs=array('GET');,22,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'time'=>'',
];,34,/n

publicfunctionexecute()
{
$time=$this->request->get('time',time());,38,/n
$domainId=$this->request->get('domain_id');,39,/n

return$this->response->statusOk($recordsMap);,51,/n


classGetHolidaysActionextendsBaseApiAction
{
protected$verbs=array('GET');,15,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'search_value'=>'',
'start_timestamp'=>'',
'end_timestamp'=>''

];,30,/n

publicfunctionexecute()
{
$searchValue=$this->request->get('search_value');,34,/n
$startTimestamp=$this->request->get('start_timestamp');,35,/n
$endTimestamp=$this->request->get('end_timestamp');,36,/n
return$this->response->statusOk($result);,38,/n

classAddAttendanceActionActionextendsBaseApiAction
{
protected$inputRules=[
'domain_id'=>'required',
'beacon_id'=>'',
'office_id'=>'',
'time'=>'',
'action_type'=>'required'
];,25,/n

constINVALID_ACTION_TYPE='add_attendance_action__invalid_action_type';,27,/n
constINVALID_ACTION_TIME='add_attendance_action__invalidtime';,28,/n
$time=$this->request->get('time');,37,/n
$beaconId=$this->request->get('beacon_id');,42,/n
$officeId=$this->request->get('office_id');,43,/n

$actionType=$this->request->get('action_type');,45,/n
if(!in_array($actionType,[
AttendanceActionType::ENTER_BEACON_REGION,
AttendanceActionType::EXIT_BEACON_REGION,
AttendanceActionType::ENTER_GEOFENCE_REGION,
AttendanceActionType::EXIT_GEOFENCE_REGION,
])){
$this->response->addErrorDialog(trans(self::INVALID_ACTION_TYPE));,52,/n
return$this->response->statusFail(trans(self::INVALID_ACTION_TYPE));,53,/n
}
if($time>$now+self::MINS_FORWARD_TOLERANCE*60){
$this->response->addErrorDialog(self::INVALID_ACTION_TIME);,60,/n
return$this->response->statusFail(self::INVALID_ACTION_TIME);,61,/n
$attributes=[
'user_id'=>\Auth::id(),
'domain_id'=>$this->domainId,
'deferred'=>$deferred,
'action_type'=>$actionType,
'time'=>$time
];,70,/n
if(isset($beaconId)&&!empty($beaconId)){
$attributes['beacon_id']=$beaconId;,72,/n
}
if(isset($officeId)&&!empty($officeId)){
$attributes['office_id']=$officeId;,75,/n
return$this->response->statusOk([
'should_refresh'=>$countAdded>0
]);,82,/n


classGetOfficesActionextendsBaseApiAction
{
protected$verbs=array('GET');,15,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'search_value'=>'',
'office_timezone'=>'',
'location_name'=>''

];,30,/n

publicfunctionexecute()
{
$searchValue=$this->request->get('search_value');,34,/n
$officeTimezone=$this->request->get('office_timezone');,35,/n
$locationName=$this->request->get('location_name');,36,/n
return$this->response->statusOk($result);,38,/n

classRegisterActionsActionextendsBaseApiAction
{

protected$inputRules=[
'actions'=>'required'
];,19,/n

publicfunctionexecute()
{
$actions=$this->request->get('actions',[]);,23,/n

classGetWorkdaysActionextendsBaseApiAction
{
protected$verbs=array('GET');,14,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'day_index'=>''
];,26,/n

publicfunctionexecute()
{
$domainId=$this->request->get('domain_id');,30,/n
$dayIndex=$this->request->get('day_index',null);,31,/n
}
return$this->response->statusOk($result);,38,/n

classWorkdaysActionextendsBaseApiAction
{
protected$verbs=array('POST');,14,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'day_index'=>'required',
'day_start_time'=>'required',
'day_end_time'=>'required'
];,28,/n


publicfunctionexecute()
{
$domainId=$this->request->get('domain_id');,33,/n
$day_index=$this->request->get('day_index');,34,/n
$dayStartTime=$this->request->get('day_start_time');,35,/n
$dayEndTime=$this->request->get('day_end_time');,36,/n

/**
*BeaconCheckInAction
*
*@authorJosephSaliba<joe@getray.com>
*/
classCheckinCheckoutActionextendsBaseApiAction
{
protected$verbs=array('POST');,24,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'beacon_id'=>'',
'in_geofence'=>'required',
'time'=>'',
'type'=>'',//Checkinorcheckout.
'is_automatic'=>''
];,40,/n
constINVALID_ACTION_TIME='add_attendance_action__invalidtime';,44,/n

constYOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN='checkin_checkout__be_around_the_office_to_checkin';,46,/n
constMANUAL_CHECKIN_NOT_AVAILBALE='checkin_checkout__manual_checkin_not_available';,47,/n

publicfunctionexecute()
{
$beaconId=$this->request->get('beacon_id');,51,/n
$inGeofence=$this->request->get('in_geofence');,53,/n
$isAutomatic=$this->request->get('is_automatic',0);,54,/n
switch($manualCheckinMode){
case$manualCheckinMode==ManualCheckinMode::OFF:{
$this->response->addErrorDialog(self::MANUAL_CHECKIN_NOT_AVAILBALE);,61,/n
return$this->response->statusFail(self::MANUAL_CHECKIN_NOT_AVAILBALE);,62,/n
if(!$validBeacon){
$this->response->addErrorDialog(self::YOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN);,69,/n
return$this->response->statusFail(self::YOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN);,70,/n
default:{
$this->response->addErrorDialog(self::YOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN);,77,/n
return$this->response->statusFail(self::YOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN);,78,/n
$actionTime=$this->request->get('time',$now);,85,/n
$type=$this->request->get('type');,86,/n
if($actionTime>$now+60*self::MINS_FORWARD_TOLERANCE){
return$this->response->statusFail(self::INVALID_ACTION_TIME);,88,/n
AttendanceAction::create([
'user_id'=>$userId,
'domain_id'=>$this->domainId,
'time'=>$actionTimeCarbon,
'action_type'=>$type,
'deferred'=>$deferredTime,
]);,101,/n
$attendanceRecord=AttendanceRecord::firstOrCreate([
'user_id'=>$userId,
'domain_id'=>$this->domainId,
'day'=>$actionTimeCarbon->toDateString()
]);,120,/n

$attendanceRecordYesterday=AttendanceRecord::where('user_id',$userId)
->where('domain_id',$this->domainId)
->where('day',$yesterday->toDateString())
->first();,141,/n

classTestGetAttendanceActionextendsBaseAction
{
publicfunctionexecute()
{
return[
'records'=>AttendanceHelper::buildAttendanceRecord(AttendanceDomainSettings::where('domain_id',68)->first())];,22,/n

classGetAttendanceRecordsActionextendsBaseApiAction
{
protected$verbs=array('GET');,22,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'time'=>'',
];,34,/n

publicfunctionexecute()
{
$time=$this->request->get('time',time());,38,/n
$domainId=$this->request->get('domain_id');,39,/n

return$this->response->statusOk($recordsMap);,51,/n


classGetHolidaysActionextendsBaseApiAction
{
protected$verbs=array('GET');,15,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'search_value'=>'',
'start_timestamp'=>'',
'end_timestamp'=>''

];,30,/n

publicfunctionexecute()
{
$searchValue=$this->request->get('search_value');,34,/n
$startTimestamp=$this->request->get('start_timestamp');,35,/n
$endTimestamp=$this->request->get('end_timestamp');,36,/n
return$this->response->statusOk($result);,38,/n

classAddAttendanceActionActionextendsBaseApiAction
{
protected$inputRules=[
'domain_id'=>'required',
'beacon_id'=>'',
'office_id'=>'',
'time'=>'',
'action_type'=>'required'
];,25,/n

constINVALID_ACTION_TYPE='add_attendance_action__invalid_action_type';,27,/n
constINVALID_ACTION_TIME='add_attendance_action__invalidtime';,28,/n
$time=$this->request->get('time');,37,/n
$beaconId=$this->request->get('beacon_id');,42,/n
$officeId=$this->request->get('office_id');,43,/n

$actionType=$this->request->get('action_type');,45,/n
if(!in_array($actionType,[
AttendanceActionType::ENTER_BEACON_REGION,
AttendanceActionType::EXIT_BEACON_REGION,
AttendanceActionType::ENTER_GEOFENCE_REGION,
AttendanceActionType::EXIT_GEOFENCE_REGION,
])){
$this->response->addErrorDialog(trans(self::INVALID_ACTION_TYPE));,52,/n
return$this->response->statusFail(trans(self::INVALID_ACTION_TYPE));,53,/n
}
if($time>$now+self::MINS_FORWARD_TOLERANCE*60){
$this->response->addErrorDialog(self::INVALID_ACTION_TIME);,60,/n
return$this->response->statusFail(self::INVALID_ACTION_TIME);,61,/n
$attributes=[
'user_id'=>\Auth::id(),
'domain_id'=>$this->domainId,
'deferred'=>$deferred,
'action_type'=>$actionType,
'time'=>$time
];,70,/n
if(isset($beaconId)&&!empty($beaconId)){
$attributes['beacon_id']=$beaconId;,72,/n
}
if(isset($officeId)&&!empty($officeId)){
$attributes['office_id']=$officeId;,75,/n
return$this->response->statusOk([
'should_refresh'=>$countAdded>0
]);,82,/n


classGetOfficesActionextendsBaseApiAction
{
protected$verbs=array('GET');,15,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'search_value'=>'',
'office_timezone'=>'',
'location_name'=>''

];,30,/n

publicfunctionexecute()
{
$searchValue=$this->request->get('search_value');,34,/n
$officeTimezone=$this->request->get('office_timezone');,35,/n
$locationName=$this->request->get('location_name');,36,/n
return$this->response->statusOk($result);,38,/n

classRegisterActionsActionextendsBaseApiAction
{

protected$inputRules=[
'actions'=>'required'
];,19,/n

publicfunctionexecute()
{
$actions=$this->request->get('actions',[]);,23,/n

classGetWorkdaysActionextendsBaseApiAction
{
protected$verbs=array('GET');,14,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'day_index'=>''
];,26,/n

publicfunctionexecute()
{
$domainId=$this->request->get('domain_id');,30,/n
$dayIndex=$this->request->get('day_index',null);,31,/n
}
return$this->response->statusOk($result);,38,/n

classWorkdaysActionextendsBaseApiAction
{
protected$verbs=array('POST');,14,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'day_index'=>'required',
'day_start_time'=>'required',
'day_end_time'=>'required'
];,28,/n


publicfunctionexecute()
{
$domainId=$this->request->get('domain_id');,33,/n
$day_index=$this->request->get('day_index');,34,/n
$dayStartTime=$this->request->get('day_start_time');,35,/n
$dayEndTime=$this->request->get('day_end_time');,36,/n

/**
*BeaconCheckInAction
*
*@authorJosephSaliba<joe@getray.com>
*/
classCheckinCheckoutActionextendsBaseApiAction
{
protected$verbs=array('POST');,24,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'beacon_id'=>'',
'in_geofence'=>'required',
'time'=>'',
'type'=>'',//Checkinorcheckout.
'is_automatic'=>''
];,40,/n
constINVALID_ACTION_TIME='add_attendance_action__invalidtime';,44,/n

constYOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN='checkin_checkout__be_around_the_office_to_checkin';,46,/n
constMANUAL_CHECKIN_NOT_AVAILBALE='checkin_checkout__manual_checkin_not_available';,47,/n

publicfunctionexecute()
{
$beaconId=$this->request->get('beacon_id');,51,/n
$inGeofence=$this->request->get('in_geofence');,53,/n
$isAutomatic=$this->request->get('is_automatic',0);,54,/n
switch($manualCheckinMode){
case$manualCheckinMode==ManualCheckinMode::OFF:{
$this->response->addErrorDialog(self::MANUAL_CHECKIN_NOT_AVAILBALE);,61,/n
return$this->response->statusFail(self::MANUAL_CHECKIN_NOT_AVAILBALE);,62,/n
if(!$validBeacon){
$this->response->addErrorDialog(self::YOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN);,69,/n
return$this->response->statusFail(self::YOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN);,70,/n
default:{
$this->response->addErrorDialog(self::YOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN);,77,/n
return$this->response->statusFail(self::YOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN);,78,/n
$actionTime=$this->request->get('time',$now);,85,/n
$type=$this->request->get('type');,86,/n
if($actionTime>$now+60*self::MINS_FORWARD_TOLERANCE){
return$this->response->statusFail(self::INVALID_ACTION_TIME);,88,/n
AttendanceAction::create([
'user_id'=>$userId,
'domain_id'=>$this->domainId,
'time'=>$actionTimeCarbon,
'action_type'=>$type,
'deferred'=>$deferredTime,
]);,101,/n
$attendanceRecord=AttendanceRecord::firstOrCreate([
'user_id'=>$userId,
'domain_id'=>$this->domainId,
'day'=>$actionTimeCarbon->toDateString()
]);,120,/n

$attendanceRecordYesterday=AttendanceRecord::where('user_id',$userId)
->where('domain_id',$this->domainId)
->where('day',$yesterday->toDateString())
->first();,141,/n

classTestGetAttendanceActionextendsBaseAction
{
publicfunctionexecute()
{
return[
'records'=>AttendanceHelper::buildAttendanceRecord(AttendanceDomainSettings::where('domain_id',68)->first())];,22,/n

classGetAttendanceRecordsActionextendsBaseApiAction
{
protected$verbs=array('GET');,22,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'time'=>'',
];,34,/n

publicfunctionexecute()
{
$time=$this->request->get('time',time());,38,/n
$domainId=$this->request->get('domain_id');,39,/n

return$this->response->statusOk($recordsMap);,51,/n


classGetHolidaysActionextendsBaseApiAction
{
protected$verbs=array('GET');,15,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'search_value'=>'',
'start_timestamp'=>'',
'end_timestamp'=>''

];,30,/n

publicfunctionexecute()
{
$searchValue=$this->request->get('search_value');,34,/n
$startTimestamp=$this->request->get('start_timestamp');,35,/n
$endTimestamp=$this->request->get('end_timestamp');,36,/n
return$this->response->statusOk($result);,38,/n

classAddAttendanceActionActionextendsBaseApiAction
{
protected$inputRules=[
'domain_id'=>'required',
'beacon_id'=>'',
'office_id'=>'',
'time'=>'',
'action_type'=>'required'
];,25,/n

constINVALID_ACTION_TYPE='add_attendance_action__invalid_action_type';,27,/n
constINVALID_ACTION_TIME='add_attendance_action__invalidtime';,28,/n
$time=$this->request->get('time');,37,/n
$beaconId=$this->request->get('beacon_id');,42,/n
$officeId=$this->request->get('office_id');,43,/n

$actionType=$this->request->get('action_type');,45,/n
if(!in_array($actionType,[
AttendanceActionType::ENTER_BEACON_REGION,
AttendanceActionType::EXIT_BEACON_REGION,
AttendanceActionType::ENTER_GEOFENCE_REGION,
AttendanceActionType::EXIT_GEOFENCE_REGION,
])){
$this->response->addErrorDialog(trans(self::INVALID_ACTION_TYPE));,52,/n
return$this->response->statusFail(trans(self::INVALID_ACTION_TYPE));,53,/n
}
if($time>$now+self::MINS_FORWARD_TOLERANCE*60){
$this->response->addErrorDialog(self::INVALID_ACTION_TIME);,60,/n
return$this->response->statusFail(self::INVALID_ACTION_TIME);,61,/n
$attributes=[
'user_id'=>\Auth::id(),
'domain_id'=>$this->domainId,
'deferred'=>$deferred,
'action_type'=>$actionType,
'time'=>$time
];,70,/n
if(isset($beaconId)&&!empty($beaconId)){
$attributes['beacon_id']=$beaconId;,72,/n
}
if(isset($officeId)&&!empty($officeId)){
$attributes['office_id']=$officeId;,75,/n
return$this->response->statusOk([
'should_refresh'=>$countAdded>0
]);,82,/n


classGetOfficesActionextendsBaseApiAction
{
protected$verbs=array('GET');,15,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'search_value'=>'',
'office_timezone'=>'',
'location_name'=>''

];,30,/n

publicfunctionexecute()
{
$searchValue=$this->request->get('search_value');,34,/n
$officeTimezone=$this->request->get('office_timezone');,35,/n
$locationName=$this->request->get('location_name');,36,/n
return$this->response->statusOk($result);,38,/n

classRegisterActionsActionextendsBaseApiAction
{

protected$inputRules=[
'actions'=>'required'
];,19,/n

publicfunctionexecute()
{
$actions=$this->request->get('actions',[]);,23,/n

classGetWorkdaysActionextendsBaseApiAction
{
protected$verbs=array('GET');,14,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'day_index'=>''
];,26,/n

publicfunctionexecute()
{
$domainId=$this->request->get('domain_id');,30,/n
$dayIndex=$this->request->get('day_index',null);,31,/n
}
return$this->response->statusOk($result);,38,/n

classWorkdaysActionextendsBaseApiAction
{
protected$verbs=array('POST');,14,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'day_index'=>'required',
'day_start_time'=>'required',
'day_end_time'=>'required'
];,28,/n


publicfunctionexecute()
{
$domainId=$this->request->get('domain_id');,33,/n
$day_index=$this->request->get('day_index');,34,/n
$dayStartTime=$this->request->get('day_start_time');,35,/n
$dayEndTime=$this->request->get('day_end_time');,36,/n

/**
*BeaconCheckInAction
*
*@authorJosephSaliba<joe@getray.com>
*/
classCheckinCheckoutActionextendsBaseApiAction
{
protected$verbs=array('POST');,24,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'beacon_id'=>'',
'in_geofence'=>'required',
'time'=>'',
'type'=>'',//Checkinorcheckout.
'is_automatic'=>''
];,40,/n
constINVALID_ACTION_TIME='add_attendance_action__invalidtime';,44,/n

constYOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN='checkin_checkout__be_around_the_office_to_checkin';,46,/n
constMANUAL_CHECKIN_NOT_AVAILBALE='checkin_checkout__manual_checkin_not_available';,47,/n

publicfunctionexecute()
{
$beaconId=$this->request->get('beacon_id');,51,/n
$inGeofence=$this->request->get('in_geofence');,53,/n
$isAutomatic=$this->request->get('is_automatic',0);,54,/n
switch($manualCheckinMode){
case$manualCheckinMode==ManualCheckinMode::OFF:{
$this->response->addErrorDialog(self::MANUAL_CHECKIN_NOT_AVAILBALE);,61,/n
return$this->response->statusFail(self::MANUAL_CHECKIN_NOT_AVAILBALE);,62,/n
if(!$validBeacon){
$this->response->addErrorDialog(self::YOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN);,69,/n
return$this->response->statusFail(self::YOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN);,70,/n
default:{
$this->response->addErrorDialog(self::YOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN);,77,/n
return$this->response->statusFail(self::YOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN);,78,/n
$actionTime=$this->request->get('time',$now);,85,/n
$type=$this->request->get('type');,86,/n
if($actionTime>$now+60*self::MINS_FORWARD_TOLERANCE){
return$this->response->statusFail(self::INVALID_ACTION_TIME);,88,/n
AttendanceAction::create([
'user_id'=>$userId,
'domain_id'=>$this->domainId,
'time'=>$actionTimeCarbon,
'action_type'=>$type,
'deferred'=>$deferredTime,
]);,101,/n
$attendanceRecord=AttendanceRecord::firstOrCreate([
'user_id'=>$userId,
'domain_id'=>$this->domainId,
'day'=>$actionTimeCarbon->toDateString()
]);,120,/n

$attendanceRecordYesterday=AttendanceRecord::where('user_id',$userId)
->where('domain_id',$this->domainId)
->where('day',$yesterday->toDateString())
->first();,141,/n

classTestGetAttendanceActionextendsBaseAction
{
publicfunctionexecute()
{
return[
'records'=>AttendanceHelper::buildAttendanceRecord(AttendanceDomainSettings::where('domain_id',68)->first())];,22,/n

classGetAttendanceRecordsActionextendsBaseApiAction
{
protected$verbs=array('GET');,22,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'time'=>'',
];,34,/n

publicfunctionexecute()
{
$time=$this->request->get('time',time());,38,/n
$domainId=$this->request->get('domain_id');,39,/n

return$this->response->statusOk($recordsMap);,51,/n


classGetHolidaysActionextendsBaseApiAction
{
protected$verbs=array('GET');,15,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'search_value'=>'',
'start_timestamp'=>'',
'end_timestamp'=>''

];,30,/n

publicfunctionexecute()
{
$searchValue=$this->request->get('search_value');,34,/n
$startTimestamp=$this->request->get('start_timestamp');,35,/n
$endTimestamp=$this->request->get('end_timestamp');,36,/n
return$this->response->statusOk($result);,38,/n

classAddAttendanceActionActionextendsBaseApiAction
{
protected$inputRules=[
'domain_id'=>'required',
'beacon_id'=>'',
'office_id'=>'',
'time'=>'',
'action_type'=>'required'
];,25,/n

constINVALID_ACTION_TYPE='add_attendance_action__invalid_action_type';,27,/n
constINVALID_ACTION_TIME='add_attendance_action__invalidtime';,28,/n
$time=$this->request->get('time');,37,/n
$beaconId=$this->request->get('beacon_id');,42,/n
$officeId=$this->request->get('office_id');,43,/n

$actionType=$this->request->get('action_type');,45,/n
if(!in_array($actionType,[
AttendanceActionType::ENTER_BEACON_REGION,
AttendanceActionType::EXIT_BEACON_REGION,
AttendanceActionType::ENTER_GEOFENCE_REGION,
AttendanceActionType::EXIT_GEOFENCE_REGION,
])){
$this->response->addErrorDialog(trans(self::INVALID_ACTION_TYPE));,52,/n
return$this->response->statusFail(trans(self::INVALID_ACTION_TYPE));,53,/n
}
if($time>$now+self::MINS_FORWARD_TOLERANCE*60){
$this->response->addErrorDialog(self::INVALID_ACTION_TIME);,60,/n
return$this->response->statusFail(self::INVALID_ACTION_TIME);,61,/n
$attributes=[
'user_id'=>\Auth::id(),
'domain_id'=>$this->domainId,
'deferred'=>$deferred,
'action_type'=>$actionType,
'time'=>$time
];,70,/n
if(isset($beaconId)&&!empty($beaconId)){
$attributes['beacon_id']=$beaconId;,72,/n
}
if(isset($officeId)&&!empty($officeId)){
$attributes['office_id']=$officeId;,75,/n
return$this->response->statusOk([
'should_refresh'=>$countAdded>0
]);,82,/n


classGetOfficesActionextendsBaseApiAction
{
protected$verbs=array('GET');,15,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'search_value'=>'',
'office_timezone'=>'',
'location_name'=>''

];,30,/n

publicfunctionexecute()
{
$searchValue=$this->request->get('search_value');,34,/n
$officeTimezone=$this->request->get('office_timezone');,35,/n
$locationName=$this->request->get('location_name');,36,/n
return$this->response->statusOk($result);,38,/n

classRegisterActionsActionextendsBaseApiAction
{

protected$inputRules=[
'actions'=>'required'
];,19,/n

publicfunctionexecute()
{
$actions=$this->request->get('actions',[]);,23,/n

classGetWorkdaysActionextendsBaseApiAction
{
protected$verbs=array('GET');,14,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'day_index'=>''
];,26,/n

publicfunctionexecute()
{
$domainId=$this->request->get('domain_id');,30,/n
$dayIndex=$this->request->get('day_index',null);,31,/n
}
return$this->response->statusOk($result);,38,/n

classWorkdaysActionextendsBaseApiAction
{
protected$verbs=array('POST');,14,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'day_index'=>'required',
'day_start_time'=>'required',
'day_end_time'=>'required'
];,28,/n


publicfunctionexecute()
{
$domainId=$this->request->get('domain_id');,33,/n
$day_index=$this->request->get('day_index');,34,/n
$dayStartTime=$this->request->get('day_start_time');,35,/n
$dayEndTime=$this->request->get('day_end_time');,36,/n

/**
*BeaconCheckInAction
*
*@authorJosephSaliba<joe@getray.com>
*/
classCheckinCheckoutActionextendsBaseApiAction
{
protected$verbs=array('POST');,24,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'beacon_id'=>'',
'in_geofence'=>'required',
'time'=>'',
'type'=>'',//Checkinorcheckout.
'is_automatic'=>''
];,40,/n
constINVALID_ACTION_TIME='add_attendance_action__invalidtime';,44,/n

constYOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN='checkin_checkout__be_around_the_office_to_checkin';,46,/n
constMANUAL_CHECKIN_NOT_AVAILBALE='checkin_checkout__manual_checkin_not_available';,47,/n

publicfunctionexecute()
{
$beaconId=$this->request->get('beacon_id');,51,/n
$inGeofence=$this->request->get('in_geofence');,53,/n
$isAutomatic=$this->request->get('is_automatic',0);,54,/n
switch($manualCheckinMode){
case$manualCheckinMode==ManualCheckinMode::OFF:{
$this->response->addErrorDialog(self::MANUAL_CHECKIN_NOT_AVAILBALE);,61,/n
return$this->response->statusFail(self::MANUAL_CHECKIN_NOT_AVAILBALE);,62,/n
if(!$validBeacon){
$this->response->addErrorDialog(self::YOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN);,69,/n
return$this->response->statusFail(self::YOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN);,70,/n
default:{
$this->response->addErrorDialog(self::YOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN);,77,/n
return$this->response->statusFail(self::YOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN);,78,/n
$actionTime=$this->request->get('time',$now);,85,/n
$type=$this->request->get('type');,86,/n
if($actionTime>$now+60*self::MINS_FORWARD_TOLERANCE){
return$this->response->statusFail(self::INVALID_ACTION_TIME);,88,/n
AttendanceAction::create([
'user_id'=>$userId,
'domain_id'=>$this->domainId,
'time'=>$actionTimeCarbon,
'action_type'=>$type,
'deferred'=>$deferredTime,
]);,101,/n
$attendanceRecord=AttendanceRecord::firstOrCreate([
'user_id'=>$userId,
'domain_id'=>$this->domainId,
'day'=>$actionTimeCarbon->toDateString()
]);,120,/n

$attendanceRecordYesterday=AttendanceRecord::where('user_id',$userId)
->where('domain_id',$this->domainId)
->where('day',$yesterday->toDateString())
->first();,141,/n

classTestGetAttendanceActionextendsBaseAction
{
publicfunctionexecute()
{
return[
'records'=>AttendanceHelper::buildAttendanceRecord(AttendanceDomainSettings::where('domain_id',68)->first())];,22,/n

classGetAttendanceRecordsActionextendsBaseApiAction
{
protected$verbs=array('GET');,22,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'time'=>'',
];,34,/n

publicfunctionexecute()
{
$time=$this->request->get('time',time());,38,/n
$domainId=$this->request->get('domain_id');,39,/n

return$this->response->statusOk($recordsMap);,51,/n


classGetHolidaysActionextendsBaseApiAction
{
protected$verbs=array('GET');,15,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'search_value'=>'',
'start_timestamp'=>'',
'end_timestamp'=>''

];,30,/n

publicfunctionexecute()
{
$searchValue=$this->request->get('search_value');,34,/n
$startTimestamp=$this->request->get('start_timestamp');,35,/n
$endTimestamp=$this->request->get('end_timestamp');,36,/n
return$this->response->statusOk($result);,38,/n

classAddAttendanceActionActionextendsBaseApiAction
{
protected$inputRules=[
'domain_id'=>'required',
'beacon_id'=>'',
'office_id'=>'',
'time'=>'',
'action_type'=>'required'
];,25,/n

constINVALID_ACTION_TYPE='add_attendance_action__invalid_action_type';,27,/n
constINVALID_ACTION_TIME='add_attendance_action__invalidtime';,28,/n
$time=$this->request->get('time');,37,/n
$beaconId=$this->request->get('beacon_id');,42,/n
$officeId=$this->request->get('office_id');,43,/n

$actionType=$this->request->get('action_type');,45,/n
if(!in_array($actionType,[
AttendanceActionType::ENTER_BEACON_REGION,
AttendanceActionType::EXIT_BEACON_REGION,
AttendanceActionType::ENTER_GEOFENCE_REGION,
AttendanceActionType::EXIT_GEOFENCE_REGION,
])){
$this->response->addErrorDialog(trans(self::INVALID_ACTION_TYPE));,52,/n
return$this->response->statusFail(trans(self::INVALID_ACTION_TYPE));,53,/n
}
if($time>$now+self::MINS_FORWARD_TOLERANCE*60){
$this->response->addErrorDialog(self::INVALID_ACTION_TIME);,60,/n
return$this->response->statusFail(self::INVALID_ACTION_TIME);,61,/n
$attributes=[
'user_id'=>\Auth::id(),
'domain_id'=>$this->domainId,
'deferred'=>$deferred,
'action_type'=>$actionType,
'time'=>$time
];,70,/n
if(isset($beaconId)&&!empty($beaconId)){
$attributes['beacon_id']=$beaconId;,72,/n
}
if(isset($officeId)&&!empty($officeId)){
$attributes['office_id']=$officeId;,75,/n
return$this->response->statusOk([
'should_refresh'=>$countAdded>0
]);,82,/n


classGetOfficesActionextendsBaseApiAction
{
protected$verbs=array('GET');,15,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'search_value'=>'',
'office_timezone'=>'',
'location_name'=>''

];,30,/n

publicfunctionexecute()
{
$searchValue=$this->request->get('search_value');,34,/n
$officeTimezone=$this->request->get('office_timezone');,35,/n
$locationName=$this->request->get('location_name');,36,/n
return$this->response->statusOk($result);,38,/n

classRegisterActionsActionextendsBaseApiAction
{

protected$inputRules=[
'actions'=>'required'
];,19,/n

publicfunctionexecute()
{
$actions=$this->request->get('actions',[]);,23,/n

classGetWorkdaysActionextendsBaseApiAction
{
protected$verbs=array('GET');,14,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'day_index'=>''
];,26,/n

publicfunctionexecute()
{
$domainId=$this->request->get('domain_id');,30,/n
$dayIndex=$this->request->get('day_index',null);,31,/n
}
return$this->response->statusOk($result);,38,/n

classWorkdaysActionextendsBaseApiAction
{
protected$verbs=array('POST');,14,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'day_index'=>'required',
'day_start_time'=>'required',
'day_end_time'=>'required'
];,28,/n


publicfunctionexecute()
{
$domainId=$this->request->get('domain_id');,33,/n
$day_index=$this->request->get('day_index');,34,/n
$dayStartTime=$this->request->get('day_start_time');,35,/n
$dayEndTime=$this->request->get('day_end_time');,36,/n

/**
*BeaconCheckInAction
*
*@authorJosephSaliba<joe@getray.com>
*/
classCheckinCheckoutActionextendsBaseApiAction
{
protected$verbs=array('POST');,24,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'beacon_id'=>'',
'in_geofence'=>'required',
'time'=>'',
'type'=>'',//Checkinorcheckout.
'is_automatic'=>''
];,40,/n
constINVALID_ACTION_TIME='add_attendance_action__invalidtime';,44,/n

constYOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN='checkin_checkout__be_around_the_office_to_checkin';,46,/n
constMANUAL_CHECKIN_NOT_AVAILBALE='checkin_checkout__manual_checkin_not_available';,47,/n

publicfunctionexecute()
{
$beaconId=$this->request->get('beacon_id');,51,/n
$inGeofence=$this->request->get('in_geofence');,53,/n
$isAutomatic=$this->request->get('is_automatic',0);,54,/n
switch($manualCheckinMode){
case$manualCheckinMode==ManualCheckinMode::OFF:{
$this->response->addErrorDialog(self::MANUAL_CHECKIN_NOT_AVAILBALE);,61,/n
return$this->response->statusFail(self::MANUAL_CHECKIN_NOT_AVAILBALE);,62,/n
if(!$validBeacon){
$this->response->addErrorDialog(self::YOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN);,69,/n
return$this->response->statusFail(self::YOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN);,70,/n
default:{
$this->response->addErrorDialog(self::YOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN);,77,/n
return$this->response->statusFail(self::YOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN);,78,/n
$actionTime=$this->request->get('time',$now);,85,/n
$type=$this->request->get('type');,86,/n
if($actionTime>$now+60*self::MINS_FORWARD_TOLERANCE){
return$this->response->statusFail(self::INVALID_ACTION_TIME);,88,/n
AttendanceAction::create([
'user_id'=>$userId,
'domain_id'=>$this->domainId,
'time'=>$actionTimeCarbon,
'action_type'=>$type,
'deferred'=>$deferredTime,
]);,101,/n
$attendanceRecord=AttendanceRecord::firstOrCreate([
'user_id'=>$userId,
'domain_id'=>$this->domainId,
'day'=>$actionTimeCarbon->toDateString()
]);,120,/n

$attendanceRecordYesterday=AttendanceRecord::where('user_id',$userId)
->where('domain_id',$this->domainId)
->where('day',$yesterday->toDateString())
->first();,141,/n

classTestGetAttendanceActionextendsBaseAction
{
publicfunctionexecute()
{
return[
'records'=>AttendanceHelper::buildAttendanceRecord(AttendanceDomainSettings::where('domain_id',68)->first())];,22,/n

classGetAttendanceRecordsActionextendsBaseApiAction
{
protected$verbs=array('GET');,22,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'time'=>'',
];,34,/n

publicfunctionexecute()
{
$time=$this->request->get('time',time());,38,/n
$domainId=$this->request->get('domain_id');,39,/n

return$this->response->statusOk($recordsMap);,51,/n


classGetHolidaysActionextendsBaseApiAction
{
protected$verbs=array('GET');,15,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'search_value'=>'',
'start_timestamp'=>'',
'end_timestamp'=>''

];,30,/n

publicfunctionexecute()
{
$searchValue=$this->request->get('search_value');,34,/n
$startTimestamp=$this->request->get('start_timestamp');,35,/n
$endTimestamp=$this->request->get('end_timestamp');,36,/n
return$this->response->statusOk($result);,38,/n

classAddAttendanceActionActionextendsBaseApiAction
{
protected$inputRules=[
'domain_id'=>'required',
'beacon_id'=>'',
'office_id'=>'',
'time'=>'',
'action_type'=>'required'
];,25,/n

constINVALID_ACTION_TYPE='add_attendance_action__invalid_action_type';,27,/n
constINVALID_ACTION_TIME='add_attendance_action__invalidtime';,28,/n
$time=$this->request->get('time');,37,/n
$beaconId=$this->request->get('beacon_id');,42,/n
$officeId=$this->request->get('office_id');,43,/n

$actionType=$this->request->get('action_type');,45,/n
if(!in_array($actionType,[
AttendanceActionType::ENTER_BEACON_REGION,
AttendanceActionType::EXIT_BEACON_REGION,
AttendanceActionType::ENTER_GEOFENCE_REGION,
AttendanceActionType::EXIT_GEOFENCE_REGION,
])){
$this->response->addErrorDialog(trans(self::INVALID_ACTION_TYPE));,52,/n
return$this->response->statusFail(trans(self::INVALID_ACTION_TYPE));,53,/n
}
if($time>$now+self::MINS_FORWARD_TOLERANCE*60){
$this->response->addErrorDialog(self::INVALID_ACTION_TIME);,60,/n
return$this->response->statusFail(self::INVALID_ACTION_TIME);,61,/n
$attributes=[
'user_id'=>\Auth::id(),
'domain_id'=>$this->domainId,
'deferred'=>$deferred,
'action_type'=>$actionType,
'time'=>$time
];,70,/n
if(isset($beaconId)&&!empty($beaconId)){
$attributes['beacon_id']=$beaconId;,72,/n
}
if(isset($officeId)&&!empty($officeId)){
$attributes['office_id']=$officeId;,75,/n
return$this->response->statusOk([
'should_refresh'=>$countAdded>0
]);,82,/n


classGetOfficesActionextendsBaseApiAction
{
protected$verbs=array('GET');,15,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'search_value'=>'',
'office_timezone'=>'',
'location_name'=>''

];,30,/n

publicfunctionexecute()
{
$searchValue=$this->request->get('search_value');,34,/n
$officeTimezone=$this->request->get('office_timezone');,35,/n
$locationName=$this->request->get('location_name');,36,/n
return$this->response->statusOk($result);,38,/n

classRegisterActionsActionextendsBaseApiAction
{

protected$inputRules=[
'actions'=>'required'
];,19,/n

publicfunctionexecute()
{
$actions=$this->request->get('actions',[]);,23,/n

classGetWorkdaysActionextendsBaseApiAction
{
protected$verbs=array('GET');,14,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'day_index'=>''
];,26,/n

publicfunctionexecute()
{
$domainId=$this->request->get('domain_id');,30,/n
$dayIndex=$this->request->get('day_index',null);,31,/n
}
return$this->response->statusOk($result);,38,/n

classWorkdaysActionextendsBaseApiAction
{
protected$verbs=array('POST');,14,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'day_index'=>'required',
'day_start_time'=>'required',
'day_end_time'=>'required'
];,28,/n


publicfunctionexecute()
{
$domainId=$this->request->get('domain_id');,33,/n
$day_index=$this->request->get('day_index');,34,/n
$dayStartTime=$this->request->get('day_start_time');,35,/n
$dayEndTime=$this->request->get('day_end_time');,36,/n

/**
*BeaconCheckInAction
*
*@authorJosephSaliba<joe@getray.com>
*/
classCheckinCheckoutActionextendsBaseApiAction
{
protected$verbs=array('POST');,24,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'beacon_id'=>'',
'in_geofence'=>'required',
'time'=>'',
'type'=>'',//Checkinorcheckout.
'is_automatic'=>''
];,40,/n
constINVALID_ACTION_TIME='add_attendance_action__invalidtime';,44,/n

constYOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN='checkin_checkout__be_around_the_office_to_checkin';,46,/n
constMANUAL_CHECKIN_NOT_AVAILBALE='checkin_checkout__manual_checkin_not_available';,47,/n

publicfunctionexecute()
{
$beaconId=$this->request->get('beacon_id');,51,/n
$inGeofence=$this->request->get('in_geofence');,53,/n
$isAutomatic=$this->request->get('is_automatic',0);,54,/n
switch($manualCheckinMode){
case$manualCheckinMode==ManualCheckinMode::OFF:{
$this->response->addErrorDialog(self::MANUAL_CHECKIN_NOT_AVAILBALE);,61,/n
return$this->response->statusFail(self::MANUAL_CHECKIN_NOT_AVAILBALE);,62,/n
if(!$validBeacon){
$this->response->addErrorDialog(self::YOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN);,69,/n
return$this->response->statusFail(self::YOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN);,70,/n
default:{
$this->response->addErrorDialog(self::YOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN);,77,/n
return$this->response->statusFail(self::YOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN);,78,/n
$actionTime=$this->request->get('time',$now);,85,/n
$type=$this->request->get('type');,86,/n
if($actionTime>$now+60*self::MINS_FORWARD_TOLERANCE){
return$this->response->statusFail(self::INVALID_ACTION_TIME);,88,/n
AttendanceAction::create([
'user_id'=>$userId,
'domain_id'=>$this->domainId,
'time'=>$actionTimeCarbon,
'action_type'=>$type,
'deferred'=>$deferredTime,
]);,101,/n
$attendanceRecord=AttendanceRecord::firstOrCreate([
'user_id'=>$userId,
'domain_id'=>$this->domainId,
'day'=>$actionTimeCarbon->toDateString()
]);,120,/n

$attendanceRecordYesterday=AttendanceRecord::where('user_id',$userId)
->where('domain_id',$this->domainId)
->where('day',$yesterday->toDateString())
->first();,141,/n

classTestGetAttendanceActionextendsBaseAction
{
publicfunctionexecute()
{
return[
'records'=>AttendanceHelper::buildAttendanceRecord(AttendanceDomainSettings::where('domain_id',68)->first())];,22,/n

classGetAttendanceRecordsActionextendsBaseApiAction
{
protected$verbs=array('GET');,22,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'time'=>'',
];,34,/n

publicfunctionexecute()
{
$time=$this->request->get('time',time());,38,/n
$domainId=$this->request->get('domain_id');,39,/n

return$this->response->statusOk($recordsMap);,51,/n


classGetHolidaysActionextendsBaseApiAction
{
protected$verbs=array('GET');,15,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'search_value'=>'',
'start_timestamp'=>'',
'end_timestamp'=>''

];,30,/n

publicfunctionexecute()
{
$searchValue=$this->request->get('search_value');,34,/n
$startTimestamp=$this->request->get('start_timestamp');,35,/n
$endTimestamp=$this->request->get('end_timestamp');,36,/n
return$this->response->statusOk($result);,38,/n

classAddAttendanceActionActionextendsBaseApiAction
{
protected$inputRules=[
'domain_id'=>'required',
'beacon_id'=>'',
'office_id'=>'',
'time'=>'',
'action_type'=>'required'
];,25,/n

constINVALID_ACTION_TYPE='add_attendance_action__invalid_action_type';,27,/n
constINVALID_ACTION_TIME='add_attendance_action__invalidtime';,28,/n
$time=$this->request->get('time');,37,/n
$beaconId=$this->request->get('beacon_id');,42,/n
$officeId=$this->request->get('office_id');,43,/n

$actionType=$this->request->get('action_type');,45,/n
if(!in_array($actionType,[
AttendanceActionType::ENTER_BEACON_REGION,
AttendanceActionType::EXIT_BEACON_REGION,
AttendanceActionType::ENTER_GEOFENCE_REGION,
AttendanceActionType::EXIT_GEOFENCE_REGION,
])){
$this->response->addErrorDialog(trans(self::INVALID_ACTION_TYPE));,52,/n
return$this->response->statusFail(trans(self::INVALID_ACTION_TYPE));,53,/n
}
if($time>$now+self::MINS_FORWARD_TOLERANCE*60){
$this->response->addErrorDialog(self::INVALID_ACTION_TIME);,60,/n
return$this->response->statusFail(self::INVALID_ACTION_TIME);,61,/n
$attributes=[
'user_id'=>\Auth::id(),
'domain_id'=>$this->domainId,
'deferred'=>$deferred,
'action_type'=>$actionType,
'time'=>$time
];,70,/n
if(isset($beaconId)&&!empty($beaconId)){
$attributes['beacon_id']=$beaconId;,72,/n
}
if(isset($officeId)&&!empty($officeId)){
$attributes['office_id']=$officeId;,75,/n
return$this->response->statusOk([
'should_refresh'=>$countAdded>0
]);,82,/n


classGetOfficesActionextendsBaseApiAction
{
protected$verbs=array('GET');,15,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'search_value'=>'',
'office_timezone'=>'',
'location_name'=>''

];,30,/n

publicfunctionexecute()
{
$searchValue=$this->request->get('search_value');,34,/n
$officeTimezone=$this->request->get('office_timezone');,35,/n
$locationName=$this->request->get('location_name');,36,/n
return$this->response->statusOk($result);,38,/n

classRegisterActionsActionextendsBaseApiAction
{

protected$inputRules=[
'actions'=>'required'
];,19,/n

publicfunctionexecute()
{
$actions=$this->request->get('actions',[]);,23,/n

classGetWorkdaysActionextendsBaseApiAction
{
protected$verbs=array('GET');,14,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'day_index'=>''
];,26,/n

publicfunctionexecute()
{
$domainId=$this->request->get('domain_id');,30,/n
$dayIndex=$this->request->get('day_index',null);,31,/n
}
return$this->response->statusOk($result);,38,/n

classWorkdaysActionextendsBaseApiAction
{
protected$verbs=array('POST');,14,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'day_index'=>'required',
'day_start_time'=>'required',
'day_end_time'=>'required'
];,28,/n


publicfunctionexecute()
{
$domainId=$this->request->get('domain_id');,33,/n
$day_index=$this->request->get('day_index');,34,/n
$dayStartTime=$this->request->get('day_start_time');,35,/n
$dayEndTime=$this->request->get('day_end_time');,36,/n

/**
*BeaconCheckInAction
*
*@authorJosephSaliba<joe@getray.com>
*/
classCheckinCheckoutActionextendsBaseApiAction
{
protected$verbs=array('POST');,24,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'beacon_id'=>'',
'in_geofence'=>'required',
'time'=>'',
'type'=>'',//Checkinorcheckout.
'is_automatic'=>''
];,40,/n
constINVALID_ACTION_TIME='add_attendance_action__invalidtime';,44,/n

constYOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN='checkin_checkout__be_around_the_office_to_checkin';,46,/n
constMANUAL_CHECKIN_NOT_AVAILBALE='checkin_checkout__manual_checkin_not_available';,47,/n

publicfunctionexecute()
{
$beaconId=$this->request->get('beacon_id');,51,/n
$inGeofence=$this->request->get('in_geofence');,53,/n
$isAutomatic=$this->request->get('is_automatic',0);,54,/n
switch($manualCheckinMode){
case$manualCheckinMode==ManualCheckinMode::OFF:{
$this->response->addErrorDialog(self::MANUAL_CHECKIN_NOT_AVAILBALE);,61,/n
return$this->response->statusFail(self::MANUAL_CHECKIN_NOT_AVAILBALE);,62,/n
if(!$validBeacon){
$this->response->addErrorDialog(self::YOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN);,69,/n
return$this->response->statusFail(self::YOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN);,70,/n
default:{
$this->response->addErrorDialog(self::YOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN);,77,/n
return$this->response->statusFail(self::YOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN);,78,/n
$actionTime=$this->request->get('time',$now);,85,/n
$type=$this->request->get('type');,86,/n
if($actionTime>$now+60*self::MINS_FORWARD_TOLERANCE){
return$this->response->statusFail(self::INVALID_ACTION_TIME);,88,/n
AttendanceAction::create([
'user_id'=>$userId,
'domain_id'=>$this->domainId,
'time'=>$actionTimeCarbon,
'action_type'=>$type,
'deferred'=>$deferredTime,
]);,101,/n
$attendanceRecord=AttendanceRecord::firstOrCreate([
'user_id'=>$userId,
'domain_id'=>$this->domainId,
'day'=>$actionTimeCarbon->toDateString()
]);,120,/n

$attendanceRecordYesterday=AttendanceRecord::where('user_id',$userId)
->where('domain_id',$this->domainId)
->where('day',$yesterday->toDateString())
->first();,141,/n

classTestGetAttendanceActionextendsBaseAction
{
publicfunctionexecute()
{
return[
'records'=>AttendanceHelper::buildAttendanceRecord(AttendanceDomainSettings::where('domain_id',68)->first())];,22,/n

classGetAttendanceRecordsActionextendsBaseApiAction
{
protected$verbs=array('GET');,22,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'time'=>'',
];,34,/n

publicfunctionexecute()
{
$time=$this->request->get('time',time());,38,/n
$domainId=$this->request->get('domain_id');,39,/n

return$this->response->statusOk($recordsMap);,51,/n


classGetHolidaysActionextendsBaseApiAction
{
protected$verbs=array('GET');,15,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'search_value'=>'',
'start_timestamp'=>'',
'end_timestamp'=>''

];,30,/n

publicfunctionexecute()
{
$searchValue=$this->request->get('search_value');,34,/n
$startTimestamp=$this->request->get('start_timestamp');,35,/n
$endTimestamp=$this->request->get('end_timestamp');,36,/n
return$this->response->statusOk($result);,38,/n

classAddAttendanceActionActionextendsBaseApiAction
{
protected$inputRules=[
'domain_id'=>'required',
'beacon_id'=>'',
'office_id'=>'',
'time'=>'',
'action_type'=>'required'
];,25,/n

constINVALID_ACTION_TYPE='add_attendance_action__invalid_action_type';,27,/n
constINVALID_ACTION_TIME='add_attendance_action__invalidtime';,28,/n
$time=$this->request->get('time');,37,/n
$beaconId=$this->request->get('beacon_id');,42,/n
$officeId=$this->request->get('office_id');,43,/n

$actionType=$this->request->get('action_type');,45,/n
if(!in_array($actionType,[
AttendanceActionType::ENTER_BEACON_REGION,
AttendanceActionType::EXIT_BEACON_REGION,
AttendanceActionType::ENTER_GEOFENCE_REGION,
AttendanceActionType::EXIT_GEOFENCE_REGION,
])){
$this->response->addErrorDialog(trans(self::INVALID_ACTION_TYPE));,52,/n
return$this->response->statusFail(trans(self::INVALID_ACTION_TYPE));,53,/n
}
if($time>$now+self::MINS_FORWARD_TOLERANCE*60){
$this->response->addErrorDialog(self::INVALID_ACTION_TIME);,60,/n
return$this->response->statusFail(self::INVALID_ACTION_TIME);,61,/n
$attributes=[
'user_id'=>\Auth::id(),
'domain_id'=>$this->domainId,
'deferred'=>$deferred,
'action_type'=>$actionType,
'time'=>$time
];,70,/n
if(isset($beaconId)&&!empty($beaconId)){
$attributes['beacon_id']=$beaconId;,72,/n
}
if(isset($officeId)&&!empty($officeId)){
$attributes['office_id']=$officeId;,75,/n
return$this->response->statusOk([
'should_refresh'=>$countAdded>0
]);,82,/n


classGetOfficesActionextendsBaseApiAction
{
protected$verbs=array('GET');,15,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'search_value'=>'',
'office_timezone'=>'',
'location_name'=>''

];,30,/n

publicfunctionexecute()
{
$searchValue=$this->request->get('search_value');,34,/n
$officeTimezone=$this->request->get('office_timezone');,35,/n
$locationName=$this->request->get('location_name');,36,/n
return$this->response->statusOk($result);,38,/n

classRegisterActionsActionextendsBaseApiAction
{

protected$inputRules=[
'actions'=>'required'
];,19,/n

publicfunctionexecute()
{
$actions=$this->request->get('actions',[]);,23,/n

classGetWorkdaysActionextendsBaseApiAction
{
protected$verbs=array('GET');,14,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'day_index'=>''
];,26,/n

publicfunctionexecute()
{
$domainId=$this->request->get('domain_id');,30,/n
$dayIndex=$this->request->get('day_index',null);,31,/n
}
return$this->response->statusOk($result);,38,/n

classWorkdaysActionextendsBaseApiAction
{
protected$verbs=array('POST');,14,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'day_index'=>'required',
'day_start_time'=>'required',
'day_end_time'=>'required'
];,28,/n


publicfunctionexecute()
{
$domainId=$this->request->get('domain_id');,33,/n
$day_index=$this->request->get('day_index');,34,/n
$dayStartTime=$this->request->get('day_start_time');,35,/n
$dayEndTime=$this->request->get('day_end_time');,36,/n

/**
*BeaconCheckInAction
*
*@authorJosephSaliba<joe@getray.com>
*/
classCheckinCheckoutActionextendsBaseApiAction
{
protected$verbs=array('POST');,24,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'beacon_id'=>'',
'in_geofence'=>'required',
'time'=>'',
'type'=>'',//Checkinorcheckout.
'is_automatic'=>''
];,40,/n
constINVALID_ACTION_TIME='add_attendance_action__invalidtime';,44,/n

constYOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN='checkin_checkout__be_around_the_office_to_checkin';,46,/n
constMANUAL_CHECKIN_NOT_AVAILBALE='checkin_checkout__manual_checkin_not_available';,47,/n

publicfunctionexecute()
{
$beaconId=$this->request->get('beacon_id');,51,/n
$inGeofence=$this->request->get('in_geofence');,53,/n
$isAutomatic=$this->request->get('is_automatic',0);,54,/n
switch($manualCheckinMode){
case$manualCheckinMode==ManualCheckinMode::OFF:{
$this->response->addErrorDialog(self::MANUAL_CHECKIN_NOT_AVAILBALE);,61,/n
return$this->response->statusFail(self::MANUAL_CHECKIN_NOT_AVAILBALE);,62,/n
if(!$validBeacon){
$this->response->addErrorDialog(self::YOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN);,69,/n
return$this->response->statusFail(self::YOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN);,70,/n
default:{
$this->response->addErrorDialog(self::YOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN);,77,/n
return$this->response->statusFail(self::YOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN);,78,/n
$actionTime=$this->request->get('time',$now);,85,/n
$type=$this->request->get('type');,86,/n
if($actionTime>$now+60*self::MINS_FORWARD_TOLERANCE){
return$this->response->statusFail(self::INVALID_ACTION_TIME);,88,/n
AttendanceAction::create([
'user_id'=>$userId,
'domain_id'=>$this->domainId,
'time'=>$actionTimeCarbon,
'action_type'=>$type,
'deferred'=>$deferredTime,
]);,101,/n
$attendanceRecord=AttendanceRecord::firstOrCreate([
'user_id'=>$userId,
'domain_id'=>$this->domainId,
'day'=>$actionTimeCarbon->toDateString()
]);,120,/n

$attendanceRecordYesterday=AttendanceRecord::where('user_id',$userId)
->where('domain_id',$this->domainId)
->where('day',$yesterday->toDateString())
->first();,141,/n

classTestGetAttendanceActionextendsBaseAction
{
publicfunctionexecute()
{
return[
'records'=>AttendanceHelper::buildAttendanceRecord(AttendanceDomainSettings::where('domain_id',68)->first())];,22,/n

classGetAttendanceRecordsActionextendsBaseApiAction
{
protected$verbs=array('GET');,22,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'time'=>'',
];,34,/n

publicfunctionexecute()
{
$time=$this->request->get('time',time());,38,/n
$domainId=$this->request->get('domain_id');,39,/n

return$this->response->statusOk($recordsMap);,51,/n


classGetHolidaysActionextendsBaseApiAction
{
protected$verbs=array('GET');,15,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'search_value'=>'',
'start_timestamp'=>'',
'end_timestamp'=>''

];,30,/n

publicfunctionexecute()
{
$searchValue=$this->request->get('search_value');,34,/n
$startTimestamp=$this->request->get('start_timestamp');,35,/n
$endTimestamp=$this->request->get('end_timestamp');,36,/n
return$this->response->statusOk($result);,38,/n

classAddAttendanceActionActionextendsBaseApiAction
{
protected$inputRules=[
'domain_id'=>'required',
'beacon_id'=>'',
'office_id'=>'',
'time'=>'',
'action_type'=>'required'
];,25,/n

constINVALID_ACTION_TYPE='add_attendance_action__invalid_action_type';,27,/n
constINVALID_ACTION_TIME='add_attendance_action__invalidtime';,28,/n
$time=$this->request->get('time');,37,/n
$beaconId=$this->request->get('beacon_id');,42,/n
$officeId=$this->request->get('office_id');,43,/n

$actionType=$this->request->get('action_type');,45,/n
if(!in_array($actionType,[
AttendanceActionType::ENTER_BEACON_REGION,
AttendanceActionType::EXIT_BEACON_REGION,
AttendanceActionType::ENTER_GEOFENCE_REGION,
AttendanceActionType::EXIT_GEOFENCE_REGION,
])){
$this->response->addErrorDialog(trans(self::INVALID_ACTION_TYPE));,52,/n
return$this->response->statusFail(trans(self::INVALID_ACTION_TYPE));,53,/n
}
if($time>$now+self::MINS_FORWARD_TOLERANCE*60){
$this->response->addErrorDialog(self::INVALID_ACTION_TIME);,60,/n
return$this->response->statusFail(self::INVALID_ACTION_TIME);,61,/n
$attributes=[
'user_id'=>\Auth::id(),
'domain_id'=>$this->domainId,
'deferred'=>$deferred,
'action_type'=>$actionType,
'time'=>$time
];,70,/n
if(isset($beaconId)&&!empty($beaconId)){
$attributes['beacon_id']=$beaconId;,72,/n
}
if(isset($officeId)&&!empty($officeId)){
$attributes['office_id']=$officeId;,75,/n
return$this->response->statusOk([
'should_refresh'=>$countAdded>0
]);,82,/n


classGetOfficesActionextendsBaseApiAction
{
protected$verbs=array('GET');,15,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'search_value'=>'',
'office_timezone'=>'',
'location_name'=>''

];,30,/n

publicfunctionexecute()
{
$searchValue=$this->request->get('search_value');,34,/n
$officeTimezone=$this->request->get('office_timezone');,35,/n
$locationName=$this->request->get('location_name');,36,/n
return$this->response->statusOk($result);,38,/n

classRegisterActionsActionextendsBaseApiAction
{

protected$inputRules=[
'actions'=>'required'
];,19,/n

publicfunctionexecute()
{
$actions=$this->request->get('actions',[]);,23,/n

classGetWorkdaysActionextendsBaseApiAction
{
protected$verbs=array('GET');,14,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'day_index'=>''
];,26,/n

publicfunctionexecute()
{
$domainId=$this->request->get('domain_id');,30,/n
$dayIndex=$this->request->get('day_index',null);,31,/n
}
return$this->response->statusOk($result);,38,/n

classWorkdaysActionextendsBaseApiAction
{
protected$verbs=array('POST');,14,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'day_index'=>'required',
'day_start_time'=>'required',
'day_end_time'=>'required'
];,28,/n


publicfunctionexecute()
{
$domainId=$this->request->get('domain_id');,33,/n
$day_index=$this->request->get('day_index');,34,/n
$dayStartTime=$this->request->get('day_start_time');,35,/n
$dayEndTime=$this->request->get('day_end_time');,36,/n

/**
*BeaconCheckInAction
*
*@authorJosephSaliba<joe@getray.com>
*/
classCheckinCheckoutActionextendsBaseApiAction
{
protected$verbs=array('POST');,24,/n

/**
*@doc{
*
*}
*@vararray
*/
protected$inputRules=[
'domain_id'=>'required',
'beacon_id'=>'',
'in_geofence'=>'required',
'time'=>'',
'type'=>'',//Checkinorcheckout.
'is_automatic'=>''
];,40,/n
constINVALID_ACTION_TIME='add_attendance_action__invalidtime';,44,/n

constYOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN='checkin_checkout__be_around_the_office_to_checkin';,46,/n
constMANUAL_CHECKIN_NOT_AVAILBALE='checkin_checkout__manual_checkin_not_available';,47,/n

publicfunctionexecute()
{
$beaconId=$this->request->get('beacon_id');,51,/n
$inGeofence=$this->request->get('in_geofence');,53,/n
$isAutomatic=$this->request->get('is_automatic',0);,54,/n
switch($manualCheckinMode){
case$manualCheckinMode==ManualCheckinMode::OFF:{
$this->response->addErrorDialog(self::MANUAL_CHECKIN_NOT_AVAILBALE);,61,/n
return$this->response->statusFail(self::MANUAL_CHECKIN_NOT_AVAILBALE);,62,/n
if(!$validBeacon){
$this->response->addErrorDialog(self::YOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN);,69,/n
return$this->response->statusFail(self::YOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN);,70,/n
default:{
$this->response->addErrorDialog(self::YOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN);,77,/n
return$this->response->statusFail(self::YOU_NEED_TO_BE_AROUND_THE_OFFICE_TO_CHECKIN);,78,/n
$actionTime=$this->request->get('time',$now);,85,/n
$type=$this->request->get('type');,86,/n
if($actionTime>$now+60*self::MINS_FORWARD_TOLERANCE){
return$this->response->statusFail(self::INVALID_ACTION_TIME);,88,/n
AttendanceAction::create([
'user_id'=>$userId,
'domain_id'=>$this->domainId,
'time'=>$actionTimeCarbon,
'action_type'=>$type,
'deferred'=>$deferredTime,
]);,101,/n
$attendanceRecord=AttendanceRecord::firstOrCreate([
'user_id'=>$userId,
'domain_id'=>$this->domainId,
'day'=>$actionTimeCarbon->toDateString()
]);,120,/n

$attendanceRecordYesterday=AttendanceRecord::where('user_id',$userId)
->where('domain_id',$this->domainId)
->where('day',$yesterday->toDateString())
->first();,141,/n

classTestGetAttendanceActionextendsBaseAction
{
publicfunctionexecute()
{
return[
'records'=>AttendanceHelper::buildAttendanceRecord(AttendanceDomainSettings::where('domain_id',68)->first())];,22,/n