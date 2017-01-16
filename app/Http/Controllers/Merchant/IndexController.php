<?php

namespace App\Http\Controllers\Merchant;

use App\Facades\EventJoinRepository;
use App\Facades\EventRepository;
use App\Models\Event;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;


class IndexController extends Controller
{

    protected $currentCustomer;

    public function __construct(Request $request) {
        $this->currentCustomer = $request->session()->get('customer');
    }

    public function index(Request $request) {

        $customer = $request->session()->get("customer");

        return view('merchant.index', compact("customer"));

    }

    public function home(Request $request) {
        $customer = $request->session()->get("customer");
        return view('merchant.home', compact("customer"));
    }

    public function event(Request $request) {

        $count = Event::where('customer_id', '=', $this->currentCustomer['customer_id'])->count();
        $totalPageNum = (int)ceil($count/10);

        $pageNum = $request->input('pageNum');
        $list = EventRepository::getMerchantEventList($this->currentCustomer['customer_id'],$pageNum);

        $pageNumEnd = $totalPageNum <= 5 ? $totalPageNum : ( (int)$pageNum < 5 ? 5 : ($pageNum - 2 + 4 > $totalPageNum ? $totalPageNum - 4 : $pageNum - 2 + 4) );

        return view('merchant.event',compact('list','pageNum','totalPageNum','pageNumEnd'));

    }

    public function addEvent() {
        return view('merchant.addEvent');
    }

    public function addPost(Request $request) {
        try {
            $data = $request->except('_url','_token','_method_', 'fileToUpload');
            $data['necessary'] = serialize(array_filter($data['necessary']));
            $data['note'] = serialize(array_filter($data['note']));
            $data['customer_id'] = $this->currentCustomer['customer_id'];
            $data['status'] = config('enumerations.EVENT_STATUS.WAITING_VERIFY');

            $eventId = EventRepository::create($data);
            if($eventId) {
                return redirect()->route('merchant.index.editEvent',['id' => $eventId, 'isPreview' => 2]);
            }
        }
        catch (\Exception $e) {
            return $this->errorBackTo(['error' => $e->getMessage()]);
        }
    }

    public function editEvent($id,Request $request) {
        $isPreview = $request->input('isPreview');
        $data = EventRepository::find($id);

        $data['necessary'] = unserialize($data['necessary']);
        $data['note'] = unserialize($data['note']);

        return view('merchant.editEvent', compact('data','isPreview'));
    }

    public function editPost(Request $request, $id) {

        $data = $request->except('_url','_token','_method', 'fileToUpload');
        $data['necessary'] = serialize(array_filter($data['necessary']));
        $data['note'] = serialize(array_filter($data['note']));
        $data['customer_id'] = $this->currentCustomer['customer_id'];

        try {
            if (EventRepository::saveById($id, $data)) {
                return redirect()->route('merchant.index.editEvent',['id' => $id, 'isPreview' => 2]);
            }
        } catch (\Exception $e) {
            return $this->errorBackTo(['error' => $e->getMessage()]);
        }

    }

    public function eventJoin($id) {
        $data = EventJoinRepository::getEventJoinList($id);

        return view('merchant.eventJoin',compact('data'));
    }

    public function eventDetail($id) {

        $event = EventRepository::findEventDetailById($id);

        if(isNullOrEmpty($event)) {
            return redirect()->route("frontend.event.eventList");
        }

        $event["time"] = convertDateToChinese($event["open_time"]) . " "
            . getWeekByDate($event["open_time"]) . date('H:i', strtotime($event["open_time"]))
            . "-" . date('H:i', strtotime($event["end_time"]));

        $event["note"] = unserialize($event["note"]);
        $event["necessary"] = unserialize($event["necessary"]);

        $data["event"] = $event;

        return view('merchant.eventDetail', compact('data'));

    }

    public function eventPreview($id) {
        $url = route('merchant.index.eventDetail',['id' => $id]);
        return view('merchant.eventPreview',compact('url'));
    }

}
