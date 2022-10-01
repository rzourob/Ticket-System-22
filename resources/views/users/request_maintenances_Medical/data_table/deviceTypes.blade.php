


                                  <td>
                                    <span class="btn btn-info">

                                        @if($maintenancerequest->deviceTypes == 1)
                                         جهاز طبي
                                        @elseif($maintenancerequest->deviceTypes == 2)
                                        جهاز تكنولوجيا المعلومات

                                        @elseif($maintenancerequest->deviceTypes == 3)
                                        جهاز هندسة وصيانة
                                        
                                        @endif
                                    </span>
                         
                                  </td>