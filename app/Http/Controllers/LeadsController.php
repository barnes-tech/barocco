<?php

namespace App\Http\Controllers;

use App\Models\{Configuration,Lead};
use Illuminate\Http\Request;

class LeadsController extends Controller
{
    private $config;

    public function __construct() {
        $this->config = Configuration::first();
    }

    public function show($leadId) {
        $lead = Lead::find($leadId);
        if(!$lead) return redirect()->back()->with('error','Lead not found.');
        return view('pages.admin.leads.show')->with([
            'config' => $this->config,
            'lead' => $lead
        ]);
    }

    public function update(Request $request, $leadId) {
        $lead = Lead::find($leadId);
        if(!$lead) return redirect()->back()->with('error','Lead not found.');
        $this->validate($request,[
            'notes' => 'max:255'
        ]);
        $lead->notes = $request->notes;
        if($lead->save()) return redirect('/leads/'.$leadId.'/show')->with('success','Notes updated successfully.');
        return redirect()->back()->with('error','Buffed.');
    }

    public function toggleResolved($leadId) {
        $lead = Lead::find($leadId);
        if(!$lead) return redirect()->back()->with('error','Lead not found.');
        $msg = $lead->resolved ? 'Lead will now show as new,':'Lead resolved';
        $lead->resolved = !$lead->resolved;
        if($lead->save()) return redirect('/dashboard')->with('success', $msg);
        return redirect()->back()->with('error','Buffed.');
    }

    public function delete($leadId) {
        $lead = Lead::find($leadId);
        if(!$lead || !$lead->resolved) return redirect()->back()->with('error','Lead must be resolved before deleting.');
        if($lead->delete()) return redirect('/dashboard')->with('success','Lead deleted successfully.');
    }
}
