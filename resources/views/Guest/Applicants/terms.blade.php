@extends('layouts.frontend')
@section('content')

    <div class="py-5 text">
          <center><strong><h3>Volunteer Agreement</h3></strong></center>
          <br>
          <p>This Volunteer Agreement is a description of the arrangement between us, WeRecycle (non-profit startup organization), and you (the volunteer) in relation to your voluntary work.  The intention of this agreement is to assure you that we appreciate your volunteering with us and to indicate our commitment to do the best we can to make your volunteer experience with us a positive and rewarding one.</p>
          <h3><strong>Part 1</strong></h3>

          We, WeRecycle, accept the voluntary service of (name of volunteer) beginning (date).
           Volunteer must be at least 15 years old.
          Your part as a volunteer is to get recyclables from the homes of people in the area of Malibay, Pasay. Segregate recyclables, make fertilizers, and deliver recyclables.
          <br><br>
<h3>We commit to the following:</h3>
<h5><strong>1. Supervision, support and flexibility</strong></h5>
  <ul>
  <li>To define appropriate standards of our services, to communicate them to you, and to encourage and support you to achieve and maintain them as part of your voluntary work.</li>
  <li>To do our best to help you develop your volunteering role with us and to be flexible in how we use your volunteering.</li>
</ul>

<h5><strong>2. Expenses</strong></h5>
  <ul>
  <li>To reimburse the following expenses incurred by you in doing your voluntary work in accordance with the procedures:
</li>
  <li>Special clothing, where this is provided by you;
</li>
</ul>

<h5><strong>3. Problems</strong></h5>
  <ul>
  <li>Any injuries acquired by the volunteer while doing volunteer work will not be covered or insured by WeRecycle.</li>
</ul>

<h5><strong>4. Confidentiality</strong></h5>
  <ul>
  <li>The volunteer acknowledges that, in the course of performing and fulfilling his/her duties hereunder, he/she may have access to and be entrusted with confidential information concerning the present and contemplated financial status and activities of WeRecycle, the Volunteer agrees with WeRecycle that he/she will not, during the continuance of this agreement, disclose any of such confidential information to any person, firm or corporation, except as required in the normal course of his engagement.</li>
</ul>

<h5><strong>5. Termination</strong></h5>
  <ul>
  <li>WeRecycle may terminate the Volunteer  at any time for just cause at common law, in which case the Employee is not entitled to any advance notice of termination or compensation in lieu of notice.</li>
  <li>The Volunteer may terminate his service at any time by providing WeRecycle with at least five (5) days advance notice of his/her intention to resign.</li>
</ul>
  <h3><strong>Part 2</strong></h3>
  <ul>
  <h5><strong>I, (name of volunteer), agree to be a volunteer with WeRecycle and commit to the following:</strong></h5>
  <li>To help WeRecycle fulfil its recycling business.</li>
  <li>To perform my volunteering role to the best of my ability</li>
  <li>To adhere to the organisation’s rules, procedures and standards. </li>
  <li>To maintain the confidential information of the organisation and of its clients.</li>
  <li>To meet the time commitments and standards undertaken, other than in exceptional circumstances, and provide reasonable notice so that alternative arrangement can be made.</li>
  <li>To provide primary contacts, who may be contacted, and to agree to a police check being carried out where necessary.</li>
</ul>

<h5><strong>My agreed voluntary time commitment is from 9am - 5pm Saturday.</strong></h5>

<h5><strong>This agreement is binding in honour only. Neither of us intends any employment relationship to be created either now or at any time in the future.</strong></h5>

<h5><strong>By proceeding to the next page this means you have agreed to our agreement.</strong></h5>
<center><a href="{{ url('/createDonor') }}"><button class="btn btn-lg">Back</button></a></center>
        </div>

        <footer class="my-5 pt-5 text-muted text-center text-small">
          <p class="mb-1">&copy; 2017-2018 WeRecycle</p>
        </footer>

@endsection
