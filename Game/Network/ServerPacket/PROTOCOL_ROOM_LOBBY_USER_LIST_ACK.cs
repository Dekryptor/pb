/*
 * C# Server Emulator Project Blackout / PointBlank
 * Authors: the__all
 * Copyright (C) 2015 | OZ-Network
 */
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using Core.Data.Parsers;
using Core.Model;

namespace Game.Network.ServerPacket
{
    public class PROTOCOL_ROOM_LOBBY_USER_LIST_ACK : SendPacket
    {
        private Channel channel;

        public PROTOCOL_ROOM_LOBBY_USER_LIST_ACK(Channel channel)
        {
            this.channel = channel;
        }

        public override void WriteImpl()
        {
            int num1 = channel.getWaitPlayers().Count != 0 ? (channel.getWaitPlayers().Count <= 8 ? channel.getWaitPlayers().Count : 8) : 0;
            WriteH((short)3855);
            WriteD(num1);
            int num2 = num1;
            for (int index = 0; index < (int)num2; ++index)
            {
                Player player = channel.getWaitPlayers()[index];
                WriteD((int)index);
                WriteD(player.getRank());
                WriteC((byte)33);
                WriteS(player.getName(), 33);
            }
           
        }
    }
}
