						<tr  id="order_<?php echo $id; ?>">
						  <td><?php echo $firstName; ?></td>
						  <td><?php echo $lastName; ?></td>
						  <td><?php echo $scheduledDate; ?></td>
						  <td>
							<div class="text-right actions">
								<div class="dropdown">
									<button class="btn btn-sm custom btn-light dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-order="<?php echo $id; ?>"><?php echo $status; ?></button>
									<div class="dropdown-menu">
									  <a class="dropdown-item" href="javascript:void(0)" onclick="updateToggleItem(this)">Assigned</a>
									  <a class="dropdown-item" href="javascript:void(0)" onclick="updateToggleItem(this)">Pending</a>
									  <a class="dropdown-item" href="javascript:void(0)" onclick="updateToggleItem(this)">On Route</a>
									  <a class="dropdown-item" href="javascript:void(0)" onclick="updateToggleItem(this)">Done</a>
									  <a class="dropdown-item" href="javascript:void(0)" onclick="updateToggleItem(this)">Canceled</a>
									</div>
									<button type="button" class="btn btn-sm btn-danger btn-circle" data-toggle="modal" data-target="#deleteModal" data-order="<?php echo $id; ?>">X</button>
								</div>
							</div>
						  </td>
						</tr>				