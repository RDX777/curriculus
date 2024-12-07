export interface WebsocketMessageInterface {
  userId: number;
  broadcastMessageUserId: number;
  message: string;
  read: boolean;
}
