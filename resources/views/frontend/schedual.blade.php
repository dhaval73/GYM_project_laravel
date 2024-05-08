@extends('frontend.layout.main')
@push('title')
    Fitness Hub Schedule
@endpush
@section('main-section')
    <div class="schedual-container">
      <h2>Gym Schedule</h2>
      <section id="schedule">
        <table>
          <tr>
            <th>Time</th>
            <td>Monday</td>
          </tr>
          <tr>
            <th>6:00 AM</th>
            <td class="class">Yoga</td>
          </tr>
          <tr>
            <th>9:00 AM</th>
            <td class="class">Cardio Blast</td>
          </tr>
          <tr>
            <th>12:00 PM</th>
            <td class="class">Strength Training</td>
          </tr>
          <tr>
            <th>5:00 PM</th>
            <td class="class">Cardio Blast</td>
          </tr>
        </table>
      
        <table>
          <tr>
            <th>Time</th>
            <td>Tuesday</td>
          </tr>
          <tr>
            <th>6:00 AM</th>
            <td class="class">Bootcamp</td>
          </tr>
          <tr>
            <th>9:00 AM</th>
            <td class="class">Pilates</td>
          </tr>
          <tr>
            <th>12:00 PM</th>
            <td class="class">Yoga</td>
          </tr>
          <tr>
            <th>5:00 PM</th>
            <td class="class">Pilates</td>
          </tr>
        </table>
        <table>
          <tr>
            <th>Time</th>
    
            <td>Wednesday</td>
          </tr>
          <tr>
            <th>6:00 AM</th>
            <td class="class">Strength Training</td>
          </tr>
          <tr>
            <th>9:00 AM</th>
            <td class="class">Cardio Blast</td>
          </tr>
          <tr>
            <th>12:00 PM</th>
            <td class="class">Cardio Blast</td>
          </tr>
          <tr>
            <th>5:00 PM</th>
            <td class="class">Pilates</td>
          </tr>
        </table>
        <table>
          <tr>
            <th>Time</th>
            <td>Thursday</td>
          </tr>
          <tr>
            <th>6:00 AM</th>
            <td class="class">Yoga</td>
          </tr>
          <tr>
            <th>9:00 AM</th>
            <td class="class">Pilates</td>
          </tr>
            <th>12:00 PM</th>
            <td class="class">Strength Training</td>
          </tr>
          <tr>
            <th>5:00 PM</th>
            <td class="class">Pilates</td>
          </tr>
        </table>
        <table>
          <tr>
            <th>Time</th>
            <td>Friday</td>
          </tr>
          <tr>
            <th>6:00 AM</th>
            <td class="class">Yoga</td>
          </tr>
          <tr>
            <th>9:00 AM</th>
            <td class="class">Zumba</td>
          </tr> 
          <tr>
            <th>12:00 PM</th>
            <td class="class">YogaPilates
          <tr>
            <th>5:00 PM</th>
            <td class="class">Zumba</td>
          </tr>
        </table>
      
      </section>
    </div>
  <!-- ********* content end ************ -->
  <!-- ************* FOOTER ********** -->
  @endsection
 
