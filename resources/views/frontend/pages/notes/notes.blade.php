@extends('frontend.master.master')
@section('content')

    <div class="probootstrap-page-wrapper">

        <section class="probootstrap-section">
            <div class="container">
                <div class="probootstrap-section probootstrap-section-colored">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-left section-heading probootstrap-animate">
                                <h1>Notes & Materials</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mx-auto probootstrap-animate">
                        <div class="probootstrap-featured-news-box">
                            <div class="probootstrap-text" >
                                <!--data search bar-->
                                <div>
                                    <form method="get">
                                        <input type="text" id="searchNote" class="form-control" placeholder="Search Notes ..." >
                                    </form>
                                </div>
                                <br>
                                <!--/data search bar-->

                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Class</th>
                                        <th>Subject</th>
                                        <th>Title</th>
                                        <th>Added on</th>
                                        <th>File</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($noteData as $key=>$note)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>
                                                    <span class="btn btn-success btn-sm">
                                                    {{$note->class}}
                                                    </span>
                                            </td>
                                            <td>
                                                    <span class="btn btn-primary btn-small">
                                                    {{$note->subject}}
                                                    </span>
                                            </td>
                                            <td>
                                                <i>{{$note->note_title}}</i>
                                            </td>
                                            <td>
                                                {{$note->created_at->toDayDateTimeString()}}
                                            </td>
                                            <td>

                                                        <a href="{{route('note-download').'/'.$note->id}}" class="btn btn-info btn-sm" name="active">
                                                            Download
                                                        </a>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

@stop