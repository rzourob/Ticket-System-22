


                                  <td>
                                    <span class="btn btn-info">

                                        @if($device->deviceTypes == 1)
                                         جهاز طبي
                                        @elseif($device->deviceTypes == 2)
                                        جهاز تكنولوجيا المعلومات

                                        @elseif($device->deviceTypes == 3)
                                        جهاز هندسة وصيانة
                                        
                                        @endif
                                    </span>
                         
                                  </td>

                                  
