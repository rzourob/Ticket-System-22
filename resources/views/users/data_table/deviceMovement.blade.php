
                                  <td>
                                    <span class="btn btn-info">

                                        @if($deviceMovement->movement_type == 1)
                                         حركة داخلية
                                        @elseif($deviceMovement->movement_type == 2)
                                        حركة خارجية
                                        
                                        @endif
                                    </span>
                         
                                  </td>